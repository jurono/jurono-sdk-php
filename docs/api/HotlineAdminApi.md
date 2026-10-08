# Hotline - Admin

Access with `$client->hotlineAdmin()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getAllRequests()` | `GET /api/hotline/admin/requests` | `HotlineAdminController_getAllRequests` |
| `getStats()` | `GET /api/hotline/admin/stats` | `HotlineAdminController_getStats` |
| `assignLawyer()` | `POST /api/hotline/admin/requests/{id}/assign` | `HotlineAdminController_assignLawyer` |
| `processRefund()` | `POST /api/hotline/admin/requests/{id}/refund` | `HotlineAdminController_processRefund` |

## `getAllRequests()`

HotlineAdminController_getAllRequests

```php
$client->hotlineAdmin()->getAllRequests(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (required): {"type": "string"}
- `query.practiceAreaId` (required): {"type": "string"}
- `query.urgency` (required): {"type": "string"}
- `query.page` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `getStats()`

HotlineAdminController_getStats

```php
$client->hotlineAdmin()->getStats(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `assignLawyer()`

HotlineAdminController_assignLawyer

```php
$client->hotlineAdmin()->assignLawyer(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AssignLawyerDto"
      }
    }
  }
}
```


## `processRefund()`

HotlineAdminController_processRefund

```php
$client->hotlineAdmin()->processRefund(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RefundRequestDto"
      }
    }
  }
}
```

