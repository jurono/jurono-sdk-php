<?php
declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response as HttpResponse;
use Jurono\Sdk\Client;
use Jurono\Sdk\Exception\ApiException;
use Jurono\Sdk\Exception\NetworkException;
use Jurono\Sdk\Generated\Operations;
use Jurono\Sdk\Response;

$tests = 0;

function same(mixed $expected, mixed $actual): void
{
    if ($expected !== $actual) {
        throw new RuntimeException('Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true));
    }
}

function raises(string $class, callable $action): Throwable
{
    try {
        $action();
    } catch (Throwable $error) {
        if ($error instanceof $class) {
            return $error;
        }
        throw $error;
    }
    throw new RuntimeException('Expected exception ' . $class);
}

function test(string $name, callable $action): void
{
    global $tests;
    $action();
    $tests++;
    echo "PASS $name\n";
}

function fixture(array $responses, ?array &$history, array $config = []): Client
{
    $history = [];
    $stack = HandlerStack::create(new MockHandler($responses));
    $stack->push(Middleware::history($history));
    return new Client(...array_merge($config, ['httpClient' => new HttpClient(['handler' => $stack])]));
}

function ok(mixed $data = ['id' => 'abc']): HttpResponse
{
    return new HttpResponse(200, ['Content-Type' => 'application/json'], json_encode([
        'success' => true, 'data' => $data, 'meta' => ['requestId' => 'req_123', 'version' => '2.0.0'],
    ], JSON_THROW_ON_ERROR));
}

test('bearer/API-key headers, origin, API version and credential removal', function (): void {
    $client = fixture([ok(), ok()], $history, ['accessToken' => 'jwt', 'apiKey' => 'key']);
    $result = $client->clients()->list();
    same('https://api.jurono.eu/api/clients', (string) $history[0]['request']->getUri());
    same('Bearer jwt', $history[0]['request']->getHeaderLine('Authorization'));
    same('key', $history[0]['request']->getHeaderLine('x-jurono-api-key'));
    same('1', $history[0]['request']->getHeaderLine('X-API-Version'));
    same(['id' => 'abc'], $result->data());
    same('req_123', $result->meta()['requestId']);
    same(true, $result->json()['success']);
    $client->setAccessToken(null)->setApiKey(null)->health()->check();
    same('', $history[1]['request']->getHeaderLine('Authorization'));
    same('https://api.jurono.eu/health', (string) $history[1]['request']->getUri());
    same('', $history[1]['request']->getHeaderLine('x-jurono-api-key'));
});

test('query booleans, zero, unicode, null omission and array serialization', function (): void {
    $client = fixture([ok()], $history);
    $client->clients()->list(query: ['isActive' => false, 'offset' => 0, 'q' => 'Müller & Co', 'tags' => ['a', 'b'], 'omit' => null]);
    same('isActive=false&offset=0&q=M%C3%BCller%20%26%20Co&tags=a&tags=b', $history[0]['request']->getUri()->getQuery());
});

test('path values are encoded and cannot escape the endpoint', function (): void {
    $client = fixture([ok()], $history);
    $client->clients()->getById('a/b?x=1#ü');
    same('/api/clients/a%2Fb%3Fx%3D1%23%C3%BC', $history[0]['request']->getUri()->getPath());
    raises(InvalidArgumentException::class, fn () => $client->clients()->getById('..'));
    raises(InvalidArgumentException::class, fn () => $client->call('ClientsController_getById'));
});

test('JSON request bodies retain wire fields and support empty objects', function (): void {
    $client = fixture([ok(), ok()], $history);
    $client->auth()->login(['email' => 'test@example.com', 'password' => 'test']);
    same('application/json', $history[0]['request']->getHeaderLine('Content-Type'));
    same(['email' => 'test@example.com', 'password' => 'test'], json_decode((string) $history[0]['request']->getBody(), true));
    $client->clients()->create(new stdClass());
    same('{}', (string) $history[1]['request']->getBody());
    raises(InvalidArgumentException::class, fn () => $client->call('AuthController_login'));
    raises(InvalidArgumentException::class, fn () => $client->auth()->login([], options: ['json' => []]));
});

test('header overrides are case insensitive and timeouts are configurable', function (): void {
    $client = fixture([ok()], $history, ['accessToken' => 'original', 'baseUrl' => 'http://localhost:3001/']);
    $client->clients()->list(headers: ['authorization' => 'Bearer other', 'X-API-Version' => '2'], options: ['timeout' => 5]);
    same('Bearer other', $history[0]['request']->getHeaderLine('Authorization'));
    same('2', $history[0]['request']->getHeaderLine('X-API-Version'));
    same(5, $history[0]['options']['timeout']);
    same('http://localhost:3001/api/clients', (string) $history[0]['request']->getUri());
});

test('multipart file upload uses a boundary and preserves bytes', function (): void {
    $client = fixture([ok()], $history);
    $file = fopen('php://temp', 'w+');
    fwrite($file, "PDF\0bytes");
    rewind($file);
    $client->call('MandatesController_processDocument', body: [
        ['name' => 'file', 'contents' => $file, 'filename' => 'test.pdf'],
    ]);
    same(true, str_starts_with($history[0]['request']->getHeaderLine('Content-Type'), 'multipart/form-data; boundary='));
    $body = (string) $history[0]['request']->getBody();
    same(true, str_contains($body, 'filename="test.pdf"'));
    same(true, str_contains($body, "PDF\0bytes"));
    fclose($file);
});

test('file downloads, empty responses and plain JSON remain usable', function (): void {
    $client = fixture([
        new HttpResponse(200, ['Content-Type' => 'application/pdf'], "%PDF\0binary"),
        new HttpResponse(204),
        new HttpResponse(200, ['Content-Type' => 'application/json'], '{"status":"ok"}'),
    ], $history);
    $response = $client->documents()->download('doc');
    same("%PDF\0binary", (string) $response->body());
    same('application/pdf', $response->header('Content-Type'));
    same(null, $client->clients()->update('client', [])->data());
    same(['status' => 'ok'], $client->health()->check()->data());
});

test('HTTP errors preserve codes, details, request IDs and retry information', function (): void {
    foreach ([401, 403, 422, 429, 500] as $status) {
        $client = fixture([new HttpResponse($status, ['Retry-After' => '60'], json_encode([
            'success' => false, 'error' => ['code' => 'AUTH_DENIED', 'message' => 'Denied', 'details' => ['scope']],
            'meta' => ['requestId' => 'req_error'],
        ]))], $history);
        $error = raises(ApiException::class, fn () => $client->clients()->list());
        same($status, $error->response->status());
        same('AUTH_DENIED', $error->errorCode());
        same('req_error', $error->requestId());
        same('60', $error->response->header('Retry-After'));
        same(['scope'], $error->response->json()['error']['details']);
        same(1, count($history));
    }
});

test('non-JSON errors retain raw bodies and malformed JSON is explicit', function (): void {
    $client = fixture([new HttpResponse(502, ['X-Request-Id' => 'edge_id'], '<html>bad gateway</html>')], $history);
    $error = raises(ApiException::class, fn () => $client->health()->check());
    same(null, $error->errorCode());
    same('edge_id', $error->requestId());
    same('<html>bad gateway</html>', (string) $error->response->body());
    raises(JsonException::class, fn () => (new Response(new HttpResponse(200, [], '{broken')))->json());
});

test('network failures are distinct from API errors and writes are not retried', function (): void {
    $client = fixture([new ConnectException('connection refused', new Request('POST', 'https://api.jurono.eu/api/clients'))], $history);
    $error = raises(NetworkException::class, fn () => $client->clients()->create(['name' => 'Test']));
    same(true, $error->getPrevious() instanceof ConnectException);
    same(1, count($history));
});

test('redirects are returned without forwarding credentials', function (): void {
    $client = fixture([new HttpResponse(302, ['Location' => 'https://example.com'])], $history, ['accessToken' => 'secret']);
    same(302, $client->health()->check(options: ['allow_redirects' => true])->status());
    same(1, count($history));
});

test('invalid origins, missing parameters and unsafe raw paths fail before transport', function (): void {
    foreach (['https://api.jurono.eu/api', 'https://user:password@example.com', 'file:///tmp', 'https://example.com?key=secret'] as $url) {
        raises(InvalidArgumentException::class, fn () => new Client(baseUrl: $url));
    }
    $client = fixture([], $history);
    raises(InvalidArgumentException::class, fn () => new Client(timeout: 0));
    raises(InvalidArgumentException::class, fn () => $client->call('Unknown_operation'));
    raises(InvalidArgumentException::class, fn () => $client->request('GET', '//example.com'));
    raises(InvalidArgumentException::class, fn () => $client->request('GET', '/../health'));
    raises(InvalidArgumentException::class, fn () => $client->call('StripeController_webhook'));
    same(0, count($history));
});

test('raw requests support endpoints absent from the contract', function (): void {
    $client = fixture([ok()], $history);
    $client->request('POST', '/api/new-endpoint', options: ['json' => ['name' => 'test']]);
    same('/api/new-endpoint', $history[0]['request']->getUri()->getPath());
    same('{"name":"test"}', (string) $history[0]['request']->getBody());
});

test('all generated methods match every OpenAPI operation and build correct requests', function (): void {
    $spec = json_decode(file_get_contents(dirname(__DIR__) . '/openapi/openapi.json'), true, 512, JSON_THROW_ON_ERROR);
    $expected = [];
    foreach ($spec['paths'] as $path => $item) {
        foreach ($item as $verb => $op) {
            if (in_array($verb, ['get', 'post', 'put', 'patch', 'delete', 'head', 'options', 'trace'], true)) {
                $expected[$op['operationId']] = [$path, strtoupper($verb), $op];
            }
        }
    }
    $covered = [];
    foreach ((new ReflectionClass(Client::class))->getMethods(ReflectionMethod::IS_PUBLIC) as $accessor) {
        $type = $accessor->getReturnType();
        if (!$type instanceof ReflectionNamedType || !str_starts_with($type->getName(), 'Jurono\\Sdk\\Api\\')) {
            continue;
        }
        $class = new ReflectionClass($type->getName());
        $source = file_get_contents($class->getFileName());
        preg_match_all('/public function (\w+)\([^\n]+\): Response\s*\{\s*return \$this->client->call\(\x27([^\x27]+)\x27/', $source, $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            [$path, $verb, $operation] = $expected[$match[2]];
            $client = fixture([ok()], $history);
            $service = $accessor->invoke($client);
            $method = $class->getMethod($match[1]);
            $args = [];
            $query = [];
            $headers = [];
            $path = preg_replace('/\{[^}]+\}/', 'test%2Fvalue', $path);
            foreach ($operation['parameters'] ?? [] as $parameter) {
                if (($parameter['required'] ?? false) && $parameter['in'] === 'query') {
                    $query[$parameter['name']] = 'required';
                } elseif (($parameter['required'] ?? false) && $parameter['in'] === 'header') {
                    $headers[$parameter['name']] = 'required';
                }
            }
            $multipart = isset($operation['requestBody']['content']['multipart/form-data']);
            foreach ($method->getParameters() as $parameter) {
                $args[] = match ($parameter->getName()) {
                    'body' => ($operation['requestBody']['required'] ?? false)
                        ? ($multipart ? [['name' => 'file', 'contents' => 'test']] : ['name' => 'test']) : null,
                    'query' => $query,
                    'headers' => $headers,
                    'options' => [],
                    default => 'test/value',
                };
            }
            $result = $method->invokeArgs($service, $args);
            same($verb, $history[0]['request']->getMethod());
            same($path, $history[0]['request']->getUri()->getPath());
            same(['id' => 'abc'], $result->data());
            same(false, isset($covered[$match[2]]));
            $covered[$match[2]] = true;
        }
    }
    $actualIds = array_keys($covered);
    $expectedIds = array_keys($expected);
    sort($actualIds);
    sort($expectedIds);
    same($expectedIds, $actualIds);
    $registryIds = array_keys(Operations::ALL);
    sort($registryIds);
    same($expectedIds, $registryIds);
    echo 'Verified ' . count($covered) . " OpenAPI operations.\n";
});

echo "$tests tests passed.\n";
