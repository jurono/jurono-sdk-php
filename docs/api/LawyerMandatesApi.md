# Lawyer Mandates

Access with `$client->lawyerMandates()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listMyMandates()` | `GET /api/lawyers/me/mandates` | `LawyerMandatesController_listMyMandates` |
| `createMandate()` | `POST /api/lawyers/me/mandates` | `LawyerMandatesController_createMandate` |
| `getMandate()` | `GET /api/lawyers/me/mandates/{id}` | `LawyerMandatesController_getMandate` |
| `updateMandate()` | `PATCH /api/lawyers/me/mandates/{id}` | `LawyerMandatesController_updateMandate` |
| `updateStatus()` | `PATCH /api/lawyers/me/mandates/{id}/status` | `LawyerMandatesController_updateStatus` |
| `assessClosure()` | `GET /api/lawyers/me/mandates/{id}/closure-assessment` | `LawyerMandatesController_assessClosure` |
| `closeMandate()` | `POST /api/lawyers/me/mandates/{id}/close` | `LawyerMandatesController_closeMandate` |
| `reopenMandate()` | `POST /api/lawyers/me/mandates/{id}/reopen` | `LawyerMandatesController_reopenMandate` |
| `acceptMandate()` | `POST /api/lawyers/me/mandates/{id}/accept` | `LawyerMandatesController_acceptMandate` |
| `declineMandate()` | `POST /api/lawyers/me/mandates/{id}/decline` | `LawyerMandatesController_declineMandate` |
| `updatePricing()` | `POST /api/lawyers/me/mandates/{id}/pricing` | `LawyerMandatesController_updatePricing` |
| `getActivity()` | `GET /api/lawyers/me/mandates/{id}/activity` | `LawyerMandatesController_getActivity` |

## `listMyMandates()`

List my mandates

```php
$client->lawyerMandates()->listMyMandates(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"type": "string"}
- `query.status` (optional): {"type": "string"}
- `query.priority` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "number"}
- `query.offset` (optional): {"type": "number"}

## `createMandate()`

Create a new mandate

```php
$client->lawyerMandates()->createMandate(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateLawyerMandateDto"
      }
    }
  }
}
```


## `getMandate()`

Get mandate details

```php
$client->lawyerMandates()->getMandate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `updateMandate()`

Update mandate

```php
$client->lawyerMandates()->updateMandate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateLawyerMandateDto"
      }
    }
  }
}
```


## `updateStatus()`

Update mandate status

```php
$client->lawyerMandates()->updateStatus(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `assessClosure()`

Assess whether a mandate can be closed

```php
$client->lawyerMandates()->assessClosure(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `closeMandate()`

Close a mandate with retention and access policy

```php
$client->lawyerMandates()->closeMandate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `reopenMandate()`

Reopen a closed mandate

```php
$client->lawyerMandates()->reopenMandate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `acceptMandate()`

Accept mandate

```php
$client->lawyerMandates()->acceptMandate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AcceptMandateDto"
      }
    }
  }
}
```


## `declineMandate()`

Decline mandate

```php
$client->lawyerMandates()->declineMandate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeclineMandateDto"
      }
    }
  }
}
```


## `updatePricing()`

Update mandate pricing

```php
$client->lawyerMandates()->updatePricing(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdatePricingDto"
      }
    }
  }
}
```


## `getActivity()`

Get mandate activity timeline

```php
$client->lawyerMandates()->getActivity(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}
