# Calendar Integrations

Access with `$client->calendarIntegrations()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listConnections()` | `GET /api/calendar-integrations` | `CalendarSyncController_listConnections` |
| `connect()` | `POST /api/calendar-integrations/{provider}/connect` | `CalendarSyncController_connect` |
| `callback()` | `GET /api/calendar-integrations/{provider}/callback` | `CalendarSyncController_callback` |
| `updateConnection()` | `PATCH /api/calendar-integrations/{id}` | `CalendarSyncController_updateConnection` |
| `deleteConnection()` | `DELETE /api/calendar-integrations/{id}` | `CalendarSyncController_deleteConnection` |
| `syncNow()` | `POST /api/calendar-integrations/{id}/sync` | `CalendarSyncController_syncNow` |

## `listConnections()`

List the current user's external calendar connections

```php
$client->calendarIntegrations()->listConnections(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `connect()`

Start OAuth connect flow; returns the provider authorize URL

```php
$client->calendarIntegrations()->connect(string $provider, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.provider` (required): {"enum": ["google", "microsoft"], "type": "string"}

## `callback()`

OAuth callback; stores the connection and redirects to the dashboard

```php
$client->calendarIntegrations()->callback(string $provider, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.provider` (required): {"enum": ["google", "microsoft"], "type": "string"}
- `query.code` (optional): {"type": "string"}
- `query.state` (optional): {"type": "string"}
- `query.error` (optional): {"type": "string"}

## `updateConnection()`

Update calendar id and sync toggles

```php
$client->calendarIntegrations()->updateConnection(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateCalendarConnectionDto"
      }
    }
  }
}
```


## `deleteConnection()`

Disconnect a calendar (best-effort removal of pushed events)

```php
$client->calendarIntegrations()->deleteConnection(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `syncNow()`

Trigger a manual inbound sync for this connection

```php
$client->calendarIntegrations()->syncNow(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
