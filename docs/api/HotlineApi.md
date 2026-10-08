# Hotline

Access with `$client->hotline()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createRequest()` | `POST /api/hotline/requests` | `HotlineController_createRequest` |
| `trackRequest()` | `GET /api/hotline/requests/track/{token}` | `HotlineController_trackRequest` |
| `cancelRequest()` | `POST /api/hotline/requests/track/{token}/cancel` | `HotlineController_cancelRequest` |
| `getPracticeAreas()` | `GET /api/hotline/practice-areas` | `HotlineController_getPracticeAreas` |
| `getPricing()` | `GET /api/hotline/pricing` | `HotlineController_getPricing` |
| `getMyRequests()` | `GET /api/hotline/my-requests` | `HotlineController_getMyRequests` |
| `rateCall()` | `POST /api/hotline/my-requests/{id}/rate` | `HotlineController_rateCall` |

## `createRequest()`

HotlineController_createRequest

```php
$client->hotline()->createRequest(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateHotlineRequestDto"
      }
    }
  }
}
```


## `trackRequest()`

HotlineController_trackRequest

```php
$client->hotline()->trackRequest(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `cancelRequest()`

HotlineController_cancelRequest

```php
$client->hotline()->cancelRequest(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `getPracticeAreas()`

HotlineController_getPracticeAreas

```php
$client->hotline()->getPracticeAreas(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.language` (required): {"type": "string"}

## `getPricing()`

HotlineController_getPricing

```php
$client->hotline()->getPricing(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getMyRequests()`

Get authenticated user's hotline requests

```php
$client->hotline()->getMyRequests(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.page` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `rateCall()`

Rate a completed hotline call

```php
$client->hotline()->rateCall(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RateHotlineCallDto"
      }
    }
  }
}
```
