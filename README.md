# Jurono PHP SDK

Official PHP SDK for the Jurono legal services API. Requires **PHP 8.2 or later**.
Includes all **765 operations in 84 services** from the API 2.0.0 public contract snapshot,
including the form-builder endpoints. Endpoint availability depends on your API deployment.

## Install with Composer

The package is available directly from GitHub. Add its VCS repository, then install:

```sh
composer config repositories.jurono vcs https://github.com/jurono/jurono-sdk-php.git
composer require jurono/sdk-php:^0.1
```

```php
require 'vendor/autoload.php';

use Jurono\Sdk\Client;

$client = new Client(accessToken: getenv('JURONO_ACCESS_TOKEN') ?: null);
$response = $client->clients()->list(query: ['limit' => 20, 'isActive' => true]);
$clients = $response->data();
```

## Download a release

Get the `.zip` or `.tar.gz` bundle from [GitHub Releases](https://github.com/jurono/jurono-sdk-php/releases/latest).
The named `jurono-sdk-php-*.zip` and `.tar.gz` assets include **runtime dependencies**;
extract and require `autoload.php` without running Composer:

```php
require '/path/to/jurono-sdk-php-0.1.0/autoload.php';

$client = new Jurono\Sdk\Client();
echo $client->health()->check()->status(); // 200
```

Verify the downloaded asset with `sha256sum -c SHA256SUMS.txt` (download both archives for that command).
GitHub's automatic “Source code” archives contain source only; run `composer install` after extracting those.

## Authentication and configuration

```php
$client = new Jurono\Sdk\Client(
    accessToken: getenv('JURONO_ACCESS_TOKEN') ?: null,
    apiKey: getenv('JURONO_API_KEY') ?: null,
    baseUrl: 'https://api.jurono.eu',
    timeout: 30.0, // seconds
    apiVersion: '1',
);

// Public authentication routes do not require a token.
$login = $client->auth()->login([
    'email' => 'you@example.com',
    'password' => getenv('JURONO_PASSWORD'),
]);
$client->setAccessToken($login->data()['accessToken']);
$user = $client->auth()->me()->data();
```

Bearer tokens are sent in `Authorization`; API keys use `x-jurono-api-key`.
API keys grant only their configured scopes and are supported by endpoints using API-key authentication.
Use a bearer token for authenticated user operations. If both credentials are set, the server's API-key guard prioritizes the key.
The SDK sends `X-API-Version: 1` by default. `baseUrl` must be an origin such as
`http://localhost:3001`; generated routes already include `/api` where appropriate.
The client does not store credentials on disk, automatically log in, refresh tokens, or manage sessions.

## API methods

See the [complete service reference](docs/api.md). Methods retain the OpenAPI operation names
after removing their controller prefix. Name collisions receive a controller prefix.
PHP arrays/objects use the API's JSON field names; request DTO validation occurs on the server.

```php
$client->clients()->getById('client-id')->data();
$client->clients()->update('client-id', ['name' => 'Updated name'])->data();
$client->mandates()->list(query: ['status' => 'IN_PROGRESS', 'limit' => 20])->data();
```

Path arguments come first, followed by `body`, `query`, `headers`, and `options`.
Use named arguments for optional query/header/options values. Pagination remains explicit;
use the response's pagination fields to fetch the next page.

Every operation is also callable by its exact OpenAPI ID:

```php
$client->call('ClientsController_getById', path: ['id' => 'client-id']);
```

The [checked-in OpenAPI snapshot](openapi/openapi.json) includes request schemas and security definitions.
Some upstream operations omit body or response schemas. Their responses are retained, and you can
provide missing request bodies through `body` or the `options` argument:

```php
$client->request('POST', '/api/new-endpoint', options: ['json' => ['name' => 'Example']]);
```

## Responses and errors

All methods return `Jurono\Sdk\Response`:

```php
$response->data();             // Jurono envelope's data, or a plain JSON payload
$response->json();             // complete decoded payload, including success/data/meta
$response->meta();             // request ID, version and other envelope metadata
$response->status();           // HTTP status
$response->header('Retry-After');
$response->body();             // PSR-7 stream, including binary downloads
$response->raw();              // original PSR-7 response
```

Empty bodies decode to `null`. Calling `json()` or `data()` on non-JSON content raises `JsonException`.
Binary/text responses remain available through `body()`.

```php
try {
    $client->clients()->getById('client-id');
} catch (Jurono\Sdk\Exception\ApiException $error) {
    $status = $error->response->status();
    $code = $error->errorCode();
    $requestId = $error->requestId();
    $retryAfter = $error->response->header('Retry-After');
} catch (Jurono\Sdk\Exception\NetworkException $error) {
    // DNS, connection or timeout failure; the transport exception is getPrevious().
}
```

HTTP 4xx/5xx responses raise `ApiException`, including HTML/text errors.
Redirect responses are returned without following them. Requests are sent once; the SDK does not
automatically retry writes or rate-limit errors. Callers decide when a retry is appropriate.

## Uploads and downloads

Multipart methods accept [Guzzle multipart parts](https://docs.guzzlephp.org/en/stable/request-options.html#multipart):

```php
$file = fopen('/path/to/document.pdf', 'rb');
try {
    $result = $client->mandates()->processDocument([
        ['name' => 'file', 'contents' => $file, 'filename' => 'document.pdf'],
    ])->data();
} finally {
    fclose($file);
}

$client->documents()->download('document-id', options: ['sink' => '/path/to/download.pdf']);
```

You can inject a `GuzzleHttp\ClientInterface` via the constructor's `httpClient` argument.
TLS verification uses Guzzle's defaults. Advanced options such as `sink`, `stream`, `timeout`,
and custom headers are forwarded to Guzzle; redirects remain disabled.

## Development and releases

```sh
git clone https://github.com/jurono/jurono-sdk-php.git
cd jurono-sdk-php
composer install
composer validate --strict
composer lint
composer typecheck
composer test
python3 scripts/generate.py --check
php scripts/smoke.php # read-only check against the production /health endpoint
```

Generation requires Python 3 with no third-party dependencies. To update the contract, copy
`apps/api/public/docs/openapi-public.json` from the Jurono API repository to `openapi/openapi.json`,
update `openapi/source.json`, and run `python3 scripts/generate.py`. Commit the snapshot,
generated PHP, reference docs, and manifest together. The generator rejects unsupported new
serialization features instead of silently omitting them. It exposes undeclared variables found
in upstream route templates as required string arguments.

CI tests PHP 8.2–8.5, runs every generated method against the contract, and exercises real local
HTTP JSON/multipart/file transfers. The tagged release workflow runs all checks before publishing
bundles with locked dependencies and SHA-256 checksums. To publish, update `Client::VERSION`
and the changelog, then push a matching `vX.Y.Z` tag. For a local bundle:

```sh
composer install --no-dev --optimize-autoloader
python3 scripts/build-release.py --version 0.1.0
```

The SDK source is MIT licensed. Access to the Jurono API remains subject to the API's own terms.
