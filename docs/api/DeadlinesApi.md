# Deadlines

Access with `$client->deadlines()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createDeadline()` | `POST /api/deadlines` | `DeadlinesController_createDeadline` |
| `listDeadlines()` | `GET /api/deadlines` | `DeadlinesController_listDeadlines` |
| `updateDeadlineStatus()` | `PATCH /api/deadlines/{id}/status` | `DeadlinesController_updateDeadlineStatus` |
| `updateDeadlineDate()` | `PATCH /api/deadlines/{id}/date` | `DeadlinesController_updateDeadlineDate` |
| `verifyDeadline()` | `POST /api/deadlines/{id}/verify` | `DeadlinesController_verifyDeadline` |
| `processDueReminders()` | `POST /api/deadlines/reminders/process-due` | `DeadlinesController_processDueReminders` |
| `createCalendarEvent()` | `POST /api/deadlines/calendar-events` | `DeadlinesController_createCalendarEvent` |
| `listCalendarEvents()` | `GET /api/deadlines/calendar-events` | `DeadlinesController_listCalendarEvents` |
| `escalateMissed()` | `POST /api/deadlines/escalate-missed` | `DeadlinesController_escalateMissed` |
| `retentionReview()` | `GET /api/deadlines/retention-review` | `DeadlinesController_retentionReview` |

## `createDeadline()`

Create a typed mandate deadline

```php
$client->deadlines()->createDeadline(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateDeadlineDto"
      }
    }
  }
}
```


## `listDeadlines()`

List organization deadlines

```php
$client->deadlines()->listDeadlines(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (required): {"type": "string", "enum": ["OPEN", "DONE", "MISSED", "CANCELLED"]}

## `updateDeadlineStatus()`

Update deadline status

```php
$client->deadlines()->updateDeadlineStatus(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateDeadlineStatusDto"
      }
    }
  }
}
```


## `updateDeadlineDate()`

Change deadline due date with audit reason

```php
$client->deadlines()->updateDeadlineDate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateDeadlineDateDto"
      }
    }
  }
}
```


## `verifyDeadline()`

Verify a deadline after manual lawyer review

```php
$client->deadlines()->verifyDeadline(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/VerifyDeadlineDto"
      }
    }
  }
}
```


## `processDueReminders()`

Process due deadline reminders with retry-safe state

```php
$client->deadlines()->processDueReminders(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createCalendarEvent()`

Create organization calendar event

```php
$client->deadlines()->createCalendarEvent(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateCalendarEventDto"
      }
    }
  }
}
```


## `listCalendarEvents()`

List organization calendar events

```php
$client->deadlines()->listCalendarEvents(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.from` (required): {"type": "string"}
- `query.to` (required): {"type": "string"}

## `escalateMissed()`

Mark overdue open deadlines as missed and notify assignees

```php
$client->deadlines()->escalateMissed(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `retentionReview()`

List mandates and documents whose retention period is due for review

```php
$client->deadlines()->retentionReview(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.asOf` (required): {"type": "string"}
