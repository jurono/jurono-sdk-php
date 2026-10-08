<?php
declare(strict_types=1);

namespace Jurono\Sdk;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/** Retains the complete HTTP response, including envelopes and file streams. */
final class Response
{
    private bool $decoded = false;
    private mixed $payload = null;

    public function __construct(private readonly ResponseInterface $response)
    {
    }

    public function status(): int
    {
        return $this->response->getStatusCode();
    }

    public function header(string $name): string
    {
        return $this->response->getHeaderLine($name);
    }

    public function raw(): ResponseInterface
    {
        return $this->response;
    }

    public function body(): StreamInterface
    {
        return $this->response->getBody();
    }

    /** Full decoded payload; null for an empty response such as HTTP 204. */
    public function json(): mixed
    {
        if (!$this->decoded) {
            $body = (string) $this->body();
            $this->payload = $body === '' ? null : json_decode($body, true, 512, JSON_THROW_ON_ERROR);
            $this->decoded = true;
        }
        return $this->payload;
    }

    /** Unwraps a Jurono success envelope; preserves plain JSON responses. */
    public function data(): mixed
    {
        $payload = $this->json();
        if (is_array($payload) && ($payload['success'] ?? null) === true && array_key_exists('data', $payload)) {
            return $payload['data'];
        }
        return $payload;
    }

    public function meta(): array
    {
        $payload = $this->json();
        return is_array($payload) && is_array($payload['meta'] ?? null) ? $payload['meta'] : [];
    }
}
