# Time Entries

Access with `$client->timeEntries()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/time-entries` | `TimeEntriesController_list` |
| `create()` | `POST /api/time-entries` | `TimeEntriesController_create` |
| `export()` | `GET /api/time-entries/export` | `TimeEntriesController_export` |
| `getSummary()` | `GET /api/time-entries/summary` | `TimeEntriesController_getSummary` |
| `getById()` | `GET /api/time-entries/{id}` | `TimeEntriesController_getById` |
| `update()` | `PUT /api/time-entries/{id}` | `TimeEntriesController_update` |
| `delete()` | `DELETE /api/time-entries/{id}` | `TimeEntriesController_delete` |

## `list()`

List time entries for current lawyer organization

```php
$client->timeEntries()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"example": 0, "type": "number"}
- `query.limit` (optional): {"example": 20, "type": "number"}
- `query.startDate` (optional): {"example": "2026-01-01T00:00:00.000Z", "type": "string"}
- `query.endDate` (optional): {"example": "2026-01-31T23:59:59.999Z", "type": "string"}
- `query.isBillable` (optional): {"example": true, "type": "boolean"}
- `query.mandateId` (optional): {"format": "uuid", "type": "string"}

## `create()`

Create a time entry

```php
$client->timeEntries()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpsertTimeEntryDto"
      }
    }
  }
}
```


## `export()`

Export time entries as CSV

```php
$client->timeEntries()->export(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"example": 0, "type": "number"}
- `query.limit` (optional): {"example": 20, "type": "number"}
- `query.startDate` (optional): {"example": "2026-01-01T00:00:00.000Z", "type": "string"}
- `query.endDate` (optional): {"example": "2026-01-31T23:59:59.999Z", "type": "string"}
- `query.isBillable` (optional): {"example": true, "type": "boolean"}
- `query.mandateId` (optional): {"format": "uuid", "type": "string"}

## `getSummary()`

Get time tracking summary for a date range

```php
$client->timeEntries()->getSummary(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.startDate` (optional): {"example": "2026-05-01T00:00:00.000Z", "type": "string"}
- `query.endDate` (optional): {"example": "2026-05-31T23:59:59.999Z", "type": "string"}

## `getById()`

Get a time entry by ID

```php
$client->timeEntries()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update a time entry

```php
$client->timeEntries()->update(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `delete()`

Delete a time entry (soft delete)

```php
$client->timeEntries()->delete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
