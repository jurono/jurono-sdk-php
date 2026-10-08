# Hotline - Lawyer

Access with `$client->hotlineLawyer()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getSettings()` | `GET /api/hotline/lawyer/settings` | `HotlineLawyerController_getSettings` |
| `updateSettings()` | `PUT /api/hotline/lawyer/settings` | `HotlineLawyerController_updateSettings` |
| `getQueue()` | `GET /api/hotline/lawyer/queue` | `HotlineLawyerController_getQueue` |
| `acceptRequest()` | `POST /api/hotline/lawyer/requests/{id}/accept` | `HotlineLawyerController_acceptRequest` |
| `startCall()` | `POST /api/hotline/lawyer/requests/{id}/start-call` | `HotlineLawyerController_startCall` |
| `completeCall()` | `POST /api/hotline/lawyer/requests/{id}/complete` | `HotlineLawyerController_completeCall` |
| `markNoAnswer()` | `POST /api/hotline/lawyer/requests/{id}/no-answer` | `HotlineLawyerController_markNoAnswer` |
| `rescheduleCall()` | `POST /api/hotline/lawyer/requests/{id}/reschedule` | `HotlineLawyerController_rescheduleCall` |

## `getSettings()`

Get hotline lawyer settings

```php
$client->hotlineLawyer()->getSettings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateSettings()`

Update hotline lawyer settings

```php
$client->hotlineLawyer()->updateSettings(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateHotlineLawyerSettingsDto"
      }
    }
  }
}
```


## `getQueue()`

Get lawyer hotline queue

```php
$client->hotlineLawyer()->getQueue(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `acceptRequest()`

Accept a hotline call request

```php
$client->hotlineLawyer()->acceptRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `startCall()`

Start a hotline call

```php
$client->hotlineLawyer()->startCall(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `completeCall()`

Complete a hotline call

```php
$client->hotlineLawyer()->completeCall(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CompleteHotlineCallDto"
      }
    }
  }
}
```


## `markNoAnswer()`

Mark hotline call as no answer

```php
$client->hotlineLawyer()->markNoAnswer(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `rescheduleCall()`

Reschedule a hotline call

```php
$client->hotlineLawyer()->rescheduleCall(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RescheduleHotlineCallDto"
      }
    }
  }
}
```
