# Clients

Access with `$client->clients()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/clients` | `ClientsController_list` |
| `create()` | `POST /api/clients` | `ClientsController_create` |
| `getById()` | `GET /api/clients/{id}` | `ClientsController_getById` |
| `update()` | `PUT /api/clients/{id}` | `ClientsController_update` |
| `resolveFromProfile()` | `POST /api/clients/resolve-from-profile` | `ClientsController_resolveFromProfile` |
| `unlinkClientProfile()` | `DELETE /api/clients/{id}/client-profile-link` | `ClientsController_unlinkClientProfile` |
| `getProfile()` | `GET /api/clients/profiles/{userId}` | `ClientsController_getProfile` |
| `upsertProfile()` | `PUT /api/clients/profiles/{userId}` | `ClientsController_upsertProfile` |
| `getClientDocuments()` | `GET /api/clients/{id}/documents` | `ClientsController_getClientDocuments` |
| `getClientBilling()` | `GET /api/clients/{id}/billing` | `ClientsController_getClientBilling` |
| `createClientInvoice()` | `POST /api/clients/{id}/billing/invoices` | `ClientsController_createClientInvoice` |
| `getClientActivity()` | `GET /api/clients/{id}/activity` | `ClientsController_getClientActivity` |
| `checkConflicts()` | `POST /api/clients/conflicts` | `ClientsController_checkConflicts` |
| `exportClients()` | `GET /api/clients/export` | `ClientsController_exportClients` |

## `list()`

List clients (admin + tenant) with filters

```php
$client->clients()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"type": "string"}
- `query.type` (optional): {"type": "string", "enum": ["INDIVIDUAL", "COMPANY", "ORGANIZATION"]}
- `query.isActive` (optional): {"type": "boolean"}
- `query.country` (optional): {"type": "string"}
- `query.city` (optional): {"type": "string"}
- `query.offset` (optional): {"minimum": 0, "default": 0, "type": "number"}
- `query.limit` (optional): {"minimum": 1, "maximum": 100, "default": 20, "type": "number"}

## `create()`

Create client (admin + tenant)

```php
$client->clients()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateClientDto"
      }
    }
  }
}
```


## `getById()`

Get client by ID (admin + tenant)

```php
$client->clients()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update client (admin + tenant)

```php
$client->clients()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateClientDto"
      }
    }
  }
}
```


## `resolveFromProfile()`

Link or create a CRM client from a JuroLib client profile

```php
$client->clients()->resolveFromProfile(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ResolveClientFromProfileDto"
      }
    }
  }
}
```


## `unlinkClientProfile()`

Sever a CRM client JuroLib profile link without deleting CRM history

```php
$client->clients()->unlinkClientProfile(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getProfile()`

Get client profile by userId (admin)

```php
$client->clients()->getProfile(string $userId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}

## `upsertProfile()`

Upsert client profile by userId (admin)

```php
$client->clients()->upsertProfile(string $userId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateClientProfileDto"
      }
    }
  }
}
```


## `getClientDocuments()`

Get documents for a client

```php
$client->clients()->getClientDocuments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.status` (optional): {"type": "string"}
- `query.search` (optional): {"type": "string"}
- `query.tag` (optional): {"type": "string"}
- `query.includeArchived` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "number"}
- `query.offset` (optional): {"type": "number"}

## `getClientBilling()`

Get billing summary and invoices for a client

```php
$client->clients()->getClientBilling(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.status` (optional): {"type": "string"}
- `query.startDate` (optional): {"type": "string"}
- `query.endDate` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "number"}
- `query.offset` (optional): {"type": "number"}

## `createClientInvoice()`

Create a new invoice for the client

```php
$client->clients()->createClientInvoice(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateClientInvoiceDto"
      }
    }
  }
}
```


## `getClientActivity()`

Get activity/audit log for a client

```php
$client->clients()->getClientActivity(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.eventType` (optional): {"type": "string"}
- `query.startDate` (optional): {"type": "string"}
- `query.endDate` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "number"}
- `query.offset` (optional): {"type": "number"}

## `checkConflicts()`

Check for potential client conflicts (admin + tenant)

```php
$client->clients()->checkConflicts(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.clientName` (optional): {"type": "string"}
- `query.companyName` (optional): {"type": "string"}
- `query.email` (optional): {"type": "string"}
- `query.excludeClientId` (optional): {"type": "string"}
- `query.opposingParty` (optional): {"type": "string"}
- `query.lawyerId` (optional): {"type": "string"}
- `query.mandateId` (optional): {"type": "string"}
- `query.resolution` (optional): {"type": "string"}

## `exportClients()`

Export clients in JSON or CSV format (admin + tenant)

```php
$client->clients()->exportClients(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.format` (optional): {"enum": ["json", "csv"], "type": "string"}
- `query.type` (optional): {"type": "string"}
- `query.isActive` (optional): {"type": "boolean"}
- `query.country` (optional): {"type": "string"}
