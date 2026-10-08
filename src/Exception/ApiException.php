<?php
declare(strict_types=1);

namespace Jurono\Sdk\Exception;

use Jurono\Sdk\Response;

final class ApiException extends \RuntimeException
{
    public function __construct(public readonly Response $response)
    {
        $message = 'Jurono API returned HTTP ' . $response->status();
        try {
            $payload = $response->json();
            $detail = is_array($payload) ? ($payload['error']['message'] ?? $payload['message'] ?? null) : null;
            if (is_string($detail)) {
                $message .= ': ' . $detail;
            }
        } catch (\JsonException) {
            // HTML/text error bodies remain accessible through response->body().
        }
        parent::__construct($message, $response->status());
    }

    public function errorCode(): ?string
    {
        try {
            $payload = $this->response->json();
            $code = is_array($payload) ? ($payload['error']['code'] ?? null) : null;
            return is_string($code) ? $code : null;
        } catch (\JsonException) {
            return null;
        }
    }

    public function requestId(): ?string
    {
        try {
            $id = $this->response->meta()['requestId'] ?? null;
            if (is_string($id)) {
                return $id;
            }
        } catch (\JsonException) {
        }
        $id = $this->response->header('X-Request-Id');
        return $id === '' ? null : $id;
    }
}
