# Engagement Packages

Access with `$client->engagementPackages()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getRequest()` | `GET /api/engagement-packages/requests/{token}` | `EngagementPackagesController_getRequest` |
| `completeRequest()` | `POST /api/engagement-packages/requests/{token}/complete` | `EngagementPackagesController_completeRequest` |

## `getRequest()`

Get a token-scoped engagement package request

```php
$client->engagementPackages()->getRequest(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `completeRequest()`

Complete an engagement package request through a scoped token

```php
$client->engagementPackages()->completeRequest(string $token, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CompleteEngagementPackageRequestDto"
      }
    }
  }
}
```
