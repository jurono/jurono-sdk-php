<?php
declare(strict_types=1);

namespace Jurono\Sdk;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Jurono\Sdk\Exception\ApiException;
use Jurono\Sdk\Exception\NetworkException;
use Jurono\Sdk\Generated\Operations;
use Jurono\Sdk\Generated\Services;

final class Client
{
    use Services;

    public const VERSION = '0.1.0';

    private readonly ClientInterface $httpClient;
    private readonly string $baseUrl;
    private array $services = [];

    public function __construct(
        private ?string $accessToken = null,
        private ?string $apiKey = null,
        string $baseUrl = 'https://api.jurono.eu',
        private readonly float $timeout = 30.0,
        private readonly string $apiVersion = '1',
        ?ClientInterface $httpClient = null,
    ) {
        $parts = parse_url($baseUrl);
        if ($parts === false || !isset($parts['host']) || !in_array($parts['scheme'] ?? '', ['https', 'http'], true)
            || isset($parts['user']) || isset($parts['pass']) || isset($parts['query']) || isset($parts['fragment'])
            || !in_array($parts['path'] ?? '', ['', '/'], true)) {
            throw new \InvalidArgumentException('baseUrl must be an HTTP(S) origin without an /api prefix.');
        }
        if ($timeout <= 0) {
            throw new \InvalidArgumentException('timeout must be greater than zero.');
        }
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->httpClient = $httpClient ?? new HttpClient();
    }

    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function setApiKey(?string $apiKey): self
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * Call any operation by its exact OpenAPI operationId.
     * Bodies use PHP arrays/objects for JSON, or Guzzle part arrays for multipart.
     * Options may include json/body/multipart for endpoints with incomplete schemas.
     */
    public function call(
        string $operationId,
        array $path = [],
        array $query = [],
        mixed $body = null,
        array $headers = [],
        array $options = [],
    ): Response {
        $operation = Operations::ALL[$operationId] ?? null;
        if ($operation === null) {
            throw new \InvalidArgumentException('Unknown operationId: ' . $operationId);
        }
        $url = $operation['path'];
        foreach ($operation['parameters'] as $parameter) {
            $name = $parameter['name'];
            if ($parameter['in'] === 'path') {
                if (!array_key_exists($name, $path) || $path[$name] === null || !is_scalar($path[$name])) {
                    throw new \InvalidArgumentException('Missing or invalid path parameter: ' . $name);
                }
                $value = (string) $path[$name];
                if ($value === '.' || $value === '..') {
                    throw new \InvalidArgumentException('Path parameters cannot be dot segments.');
                }
                $url = str_replace('{' . $name . '}', rawurlencode($value), $url);
            } elseif ($parameter['required'] && $parameter['in'] === 'query'
                && (!array_key_exists($name, $query) || $query[$name] === null)) {
                throw new \InvalidArgumentException('Missing query parameter: ' . $name);
            } elseif ($parameter['required'] && $parameter['in'] === 'header') {
                $provided = array_change_key_case(array_merge($options['headers'] ?? [], $headers), CASE_LOWER);
                if (!isset($provided[strtolower($name)])) {
                    throw new \InvalidArgumentException('Missing header parameter: ' . $name);
                }
            }
        }
        if ($operation['bodyRequired'] && $body === null
            && !array_key_exists('json', $options) && !array_key_exists('body', $options) && !array_key_exists('multipart', $options)) {
            throw new \InvalidArgumentException('A request body is required for ' . $operationId);
        }
        if ($body !== null) {
            if (array_key_exists('json', $options) || array_key_exists('body', $options) || array_key_exists('multipart', $options)) {
                throw new \InvalidArgumentException('Provide the body argument or a body option, not both.');
            }
            $options[$operation['mediaType'] === 'multipart/form-data' ? 'multipart' : 'json'] = $body;
        }
        return $this->request($operation['method'], $url, $query, $headers, $options);
    }

    /** Low-level escape hatch for new or incompletely documented endpoints. */
    public function request(string $method, string $path, array $query = [], array $headers = [], array $options = []): Response
    {
        if (!str_starts_with($path, '/') || str_starts_with($path, '//') || strpbrk($path, "\\?#") !== false
            || preg_match('~(?:^|/)\.{1,2}(?:/|$)~', $path) || str_contains($path, '{')) {
            throw new \InvalidArgumentException('path must be an absolute API path with no origin, query, or dot segments.');
        }
        $defaults = ['Accept' => 'application/json', 'User-Agent' => 'jurono-sdk-php/' . self::VERSION, 'X-API-Version' => $this->apiVersion];
        if ($this->accessToken !== null && $this->accessToken !== '') {
            $defaults['Authorization'] = 'Bearer ' . $this->accessToken;
        }
        if ($this->apiKey !== null && $this->apiKey !== '') {
            $defaults['x-jurono-api-key'] = $this->apiKey;
        }
        // Header names are case insensitive; caller values take precedence.
        $mergedHeaders = [];
        foreach ([$defaults, $options['headers'] ?? [], $headers] as $set) {
            foreach ($set as $name => $value) {
                $mergedHeaders[strtolower($name)] = $value;
            }
        }
        $options['headers'] = $mergedHeaders;
        $options['timeout'] ??= $this->timeout;
        $options['connect_timeout'] ??= min(10.0, $this->timeout);
        // Redirects can forward credentials. Return them to the caller instead.
        $options['allow_redirects'] = false;
        $options['http_errors'] = false;
        if ($query !== []) {
            $options['query'] = self::encodeQuery($query);
        }
        try {
            $response = new Response($this->httpClient->request(strtoupper($method), $this->baseUrl . $path, $options));
        } catch (GuzzleException $error) {
            throw new NetworkException('Unable to reach the Jurono API.', 0, $error);
        }
        if ($response->status() >= 400) {
            throw new ApiException($response);
        }
        return $response;
    }

    private static function encodeQuery(array $query): string
    {
        $parts = [];
        foreach ($query as $name => $value) {
            if ($value === null) {
                continue;
            }
            foreach (is_array($value) ? $value : [$value] as $item) {
                if (!is_scalar($item)) {
                    throw new \InvalidArgumentException('Query values must be scalars or lists of scalars.');
                }
                $text = is_bool($item) ? ($item ? 'true' : 'false') : (string) $item;
                $parts[] = rawurlencode((string) $name) . '=' . rawurlencode($text);
            }
        }
        return implode('&', $parts);
    }
}
