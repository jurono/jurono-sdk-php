# Trial

Access with `$client->trial()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getTrialStatus()` | `GET /api/trial/status` | `TrialController_getTrialStatus` |
| `activateTrial()` | `POST /api/trial/activate` | `TrialController_activateTrial` |
| `getTrialStatusAdmin()` | `GET /api/trial/admin/{organizationId}/status` | `TrialController_getTrialStatusAdmin` |
| `extendTrial()` | `POST /api/trial/admin/{organizationId}/extend` | `TrialController_extendTrial` |
| `cancelTrial()` | `POST /api/trial/admin/{organizationId}/cancel` | `TrialController_cancelTrial` |
| `convertTrial()` | `POST /api/trial/admin/{organizationId}/convert` | `TrialController_convertTrial` |

## `getTrialStatus()`

Get trial status for current organization

```php
$client->trial()->getTrialStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `activateTrial()`

Activate trial with first meaningful action

```php
$client->trial()->activateTrial(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ActivateTrialDto"
      }
    }
  }
}
```


## `getTrialStatusAdmin()`

Get trial status for any organization (admin only)

```php
$client->trial()->getTrialStatusAdmin(string $organizationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

## `extendTrial()`

Extend trial for organization (admin only)

```php
$client->trial()->extendTrial(string $organizationId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ExtendTrialDto"
      }
    }
  }
}
```


## `cancelTrial()`

Cancel trial for organization (admin only)

```php
$client->trial()->cancelTrial(string $organizationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

## `convertTrial()`

Convert trial to paid (called by billing webhooks)

```php
$client->trial()->convertTrial(string $organizationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}
