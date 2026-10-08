# SecureMessaging

Access with `$client->securemessaging()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createConversation()` | `POST /api/secure-messaging/conversations` | `SecureMessagingController_createConversation` |
| `getConversations()` | `GET /api/secure-messaging/conversations` | `SecureMessagingController_getConversations` |
| `getConversation()` | `GET /api/secure-messaging/conversations/{id}` | `SecureMessagingController_getConversation` |
| `sendMessage()` | `POST /api/secure-messaging/conversations/{id}/messages` | `SecureMessagingController_sendMessage` |
| `getMessages()` | `GET /api/secure-messaging/conversations/{id}/messages` | `SecureMessagingController_getMessages` |
| `createInternalNote()` | `POST /api/secure-messaging/conversations/{id}/internal-notes` | `SecureMessagingController_createInternalNote` |
| `markMessagesAsRead()` | `POST /api/secure-messaging/conversations/{id}/messages/read` | `SecureMessagingController_markMessagesAsRead` |
| `healthCheck()` | `GET /api/secure-messaging/health` | `SecureMessagingController_healthCheck` |

## `createConversation()`

Create a secure conversation

```php
$client->securemessaging()->createConversation(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "lawyerId"
        ],
        "properties": {
          "lawyerId": {
            "type": "string"
          },
          "mandateId": {
            "type": "string",
            "nullable": true
          },
          "subject": {
            "type": "string",
            "nullable": true
          },
          "privilegeLevel": {
            "type": "string",
            "nullable": true,
            "enum": [
              "PUBLIC",
              "INTERNAL",
              "ATTORNEY_CLIENT",
              "ATTORNEY_WORK_PRODUCT",
              "SETTLEMENT_CONFIDENTIAL"
            ]
          }
        }
      }
    }
  }
}
```


## `getConversations()`

List secure conversations for the current user

```php
$client->securemessaging()->getConversations(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (optional): {"enum": ["ACTIVE", "ARCHIVED", "CLOSED", "BLOCKED"], "type": "string"}
- `query.limit` (optional): {"example": 50, "type": "number"}
- `query.offset` (optional): {"example": 0, "type": "number"}

## `getConversation()`

Get a secure conversation by ID

```php
$client->securemessaging()->getConversation(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `sendMessage()`

Send a secure message within a conversation

```php
$client->securemessaging()->sendMessage(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "content"
        ],
        "properties": {
          "content": {
            "type": "string",
            "example": "Please review the attached draft."
          },
          "type": {
            "type": "string",
            "nullable": true,
            "enum": [
              "TEXT",
              "DOCUMENT",
              "IMAGE",
              "SYSTEM_NOTIFICATION",
              "APPOINTMENT_REMINDER",
              "CASE_UPDATE",
              "PAYMENT_NOTIFICATION"
            ]
          },
          "priority": {
            "type": "string",
            "nullable": true,
            "enum": [
              "LOW",
              "NORMAL",
              "HIGH",
              "URGENT"
            ]
          },
          "replyToId": {
            "type": "string",
            "nullable": true
          },
          "idempotencyKey": {
            "type": "string",
            "nullable": true
          },
          "attachmentDocumentIds": {
            "type": "array",
            "nullable": true,
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


## `getMessages()`

Retrieve decrypted messages for a conversation

```php
$client->securemessaging()->getMessages(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.limit` (optional): {"example": 50, "type": "number"}
- `query.offset` (optional): {"example": 0, "type": "number"}

## `createInternalNote()`

Create an internal note for a secure conversation

```php
$client->securemessaging()->createInternalNote(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "content"
        ],
        "properties": {
          "content": {
            "type": "string",
            "minLength": 1
          },
          "title": {
            "type": "string",
            "nullable": true
          }
        }
      }
    }
  }
}
```


## `markMessagesAsRead()`

Mark secure messages as read

```php
$client->securemessaging()->markMessagesAsRead(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "messageIds"
        ],
        "properties": {
          "messageIds": {
            "type": "array",
            "minItems": 1,
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


## `healthCheck()`

Secure messaging service health check

```php
$client->securemessaging()->healthCheck(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

