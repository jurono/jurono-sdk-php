# DATEV Account Numbers

Access with `$client->datevAccountNumbers()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listMappings()` | `GET /api/datev/account-numbers` | `DatevAccountNumberController_listMappings` |
| `getClientAccountNumber()` | `GET /api/datev/account-numbers/client/{clientId}` | `DatevAccountNumberController_getClientAccountNumber` |
| `getOrCreateAccountNumber()` | `POST /api/datev/account-numbers/client/{clientId}` | `DatevAccountNumberController_getOrCreateAccountNumber` |
| `deactivateAccountNumber()` | `DELETE /api/datev/account-numbers/client/{clientId}` | `DatevAccountNumberController_deactivateAccountNumber` |
| `assignAccountNumber()` | `POST /api/datev/account-numbers/assign` | `DatevAccountNumberController_assignAccountNumber` |
| `reactivateAccountNumber()` | `POST /api/datev/account-numbers/client/{clientId}/reactivate` | `DatevAccountNumberController_reactivateAccountNumber` |
| `peekNextAccountNumber()` | `GET /api/datev/account-numbers/next` | `DatevAccountNumberController_peekNextAccountNumber` |
| `bulkAssign()` | `POST /api/datev/account-numbers/bulk-assign` | `DatevAccountNumberController_bulkAssign` |

## `listMappings()`

List account number mappings

```php
$client->datevAccountNumbers()->listMappings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.accountType` (optional): {"type": "string", "enum": ["DEBTOR", "CREDITOR"]}
- `query.activeOnly` (optional): {"default": true, "type": "boolean"}
- `query.limit` (optional): {"default": 50, "type": "number"}
- `query.offset` (optional): {"default": 0, "type": "number"}

## `getClientAccountNumber()`

Get account number for a client

```php
$client->datevAccountNumbers()->getClientAccountNumber(string $clientId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.clientId` (required): {"type": "string"}

## `getOrCreateAccountNumber()`

Get or create account number

```php
$client->datevAccountNumbers()->getOrCreateAccountNumber(string $clientId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.clientId` (required): {"type": "string"}

## `deactivateAccountNumber()`

Deactivate client account number

```php
$client->datevAccountNumbers()->deactivateAccountNumber(string $clientId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.clientId` (required): {"type": "string"}

## `assignAccountNumber()`

Assign account number to client

```php
$client->datevAccountNumbers()->assignAccountNumber(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AssignAccountNumberDto"
      }
    }
  }
}
```


## `reactivateAccountNumber()`

Reactivate client account number

```php
$client->datevAccountNumbers()->reactivateAccountNumber(string $clientId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.clientId` (required): {"type": "string"}

## `peekNextAccountNumber()`

Get next available account number

```php
$client->datevAccountNumbers()->peekNextAccountNumber(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `bulkAssign()`

Bulk assign account numbers

```php
$client->datevAccountNumbers()->bulkAssign(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

