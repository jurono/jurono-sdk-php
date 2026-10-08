# Notifications

Access with `$client->notifications()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/notifications` | `NotificationsController_list` |
| `markRead()` | `POST /api/notifications/mark-read` | `NotificationsController_markRead` |
| `getPreferences()` | `GET /api/notifications/preferences` | `NotificationsController_getPreferences` |
| `updatePreferences()` | `PUT /api/notifications/preferences` | `NotificationsController_updatePreferences` |
| `getPushStatus()` | `GET /api/notifications/push/status` | `NotificationsController_getPushStatus` |
| `subscribePush()` | `POST /api/notifications/push/subscribe` | `NotificationsController_subscribePush` |
| `unsubscribePush()` | `POST /api/notifications/push/unsubscribe` | `NotificationsController_unsubscribePush` |
| `unsubscribe()` | `POST /api/notifications/unsubscribe` | `NotificationsController_unsubscribe` |
| `getPreferencesByEmail()` | `GET /api/notifications/preferences/by-email` | `NotificationsController_getPreferencesByEmail` |
| `listDeliveryFailures()` | `GET /api/notifications/deliveries/failures` | `NotificationsController_listDeliveryFailures` |
| `getStats()` | `GET /api/notifications/stats` | `NotificationsController_getStats` |

## `list()`

List notifications for current user

```php
$client->notifications()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `markRead()`

Mark notifications as read

```php
$client->notifications()->markRead(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "properties": {
          "ids": {
            "type": "array",
            "items": {
              "type": "string"
            }
          }
        }
      }
    }
  }
}
```


## `getPreferences()`

Get notification preferences

```php
$client->notifications()->getPreferences(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updatePreferences()`

Update notification preferences

```php
$client->notifications()->updatePreferences(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateNotificationPreferencesDto"
      }
    }
  }
}
```


## `getPushStatus()`

Get browser push notification status

```php
$client->notifications()->getPushStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `subscribePush()`

Register a browser push subscription

```php
$client->notifications()->subscribePush(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RegisterPushSubscriptionDto"
      }
    }
  }
}
```


## `unsubscribePush()`

Remove a browser push subscription

```php
$client->notifications()->unsubscribePush(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RemovePushSubscriptionDto"
      }
    }
  }
}
```


## `unsubscribe()`

Unsubscribe from notifications

```php
$client->notifications()->unsubscribe(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "oneOf": [
          {
            "$ref": "#/components/schemas/UnsubscribeRequestDto"
          },
          {
            "$ref": "#/components/schemas/UnsubscribeWithTokenDto"
          }
        ]
      }
    }
  }
}
```


## `getPreferencesByEmail()`

Get preferences by email (Admin)

```php
$client->notifications()->getPreferencesByEmail(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.email` (required): {"type": "string"}

## `listDeliveryFailures()`

List failed notification deliveries (Admin)

```php
$client->notifications()->listDeliveryFailures(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.organizationId` (optional): {"type": "string"}
- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `getStats()`

Get notification stats for current user

```php
$client->notifications()->getStats(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

