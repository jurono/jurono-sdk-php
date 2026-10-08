# beA Integration

Access with `$client->beaIntegration()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `verifyMailbox()` | `POST /api/integrations/bea/verify-mailbox` | `BeaController_verifyMailbox` |
| `getInboxOverview()` | `GET /api/integrations/bea/inbox/overview` | `BeaController_getInboxOverview` |
| `getMessages()` | `GET /api/integrations/bea/inbox/folders/{folderId}/messages` | `BeaController_getMessages` |
| `getTransmissionStatus()` | `GET /api/integrations/bea/transmissions/{id}` | `BeaController_getTransmissionStatus` |
| `reconcileTransmission()` | `POST /api/integrations/bea/transmissions/{id}/reconcile` | `BeaController_reconcileTransmission` |
| `prepareMandateOutboundMessage()` | `POST /api/integrations/bea/mandates/{mandateId}/outbound-messages` | `BeaController_prepareMandateOutboundMessage` |
| `getOutboundMessage()` | `GET /api/integrations/bea/outbound-messages/{id}` | `BeaController_getOutboundMessage` |
| `submitOutboundMessage()` | `POST /api/integrations/bea/outbound-messages/{id}/submit` | `BeaController_submitOutboundMessage` |
| `sendMessage()` | `POST /api/integrations/bea/messages/send` | `BeaController_sendMessage` |
| `getMessage()` | `GET /api/integrations/bea/inbox/messages/{messageId}` | `BeaController_getMessage` |
| `downloadAttachment()` | `GET /api/integrations/bea/inbox/messages/{messageId}/attachments/{attachmentId}/download` | `BeaController_downloadAttachment` |
| `replyToMessage()` | `POST /api/integrations/bea/inbox/messages/{messageId}/reply` | `BeaController_replyToMessage` |
| `ingest()` | `POST /api/integrations/bea/incoming` | `BeaIncomingController_ingest` |

## `verifyMailbox()`

Verify beA mailbox

```php
$client->beaIntegration()->verifyMailbox(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/VerifyMailboxDto"
      }
    }
  }
}
```


## `getInboxOverview()`

Get inbox folder overview

```php
$client->beaIntegration()->getInboxOverview(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getMessages()`

Get messages in folder

```php
$client->beaIntegration()->getMessages(string $folderId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.folderId` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `getTransmissionStatus()`

Get transmission status

```php
$client->beaIntegration()->getTransmissionStatus(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `reconcileTransmission()`

Reconcile beA transmission status with provider evidence

```php
$client->beaIntegration()->reconcileTransmission(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `prepareMandateOutboundMessage()`

Prepare a mandate-native beA outbound message

```php
$client->beaIntegration()->prepareMandateOutboundMessage(string $mandateId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PrepareBeaOutboundMessageDto"
      }
    }
  }
}
```


## `getOutboundMessage()`

Get a beA outbound message with evidence snapshots

```php
$client->beaIntegration()->getOutboundMessage(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `submitOutboundMessage()`

Submit a prepared beA outbound message

```php
$client->beaIntegration()->submitOutboundMessage(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `sendMessage()`

Send a document via beA

```php
$client->beaIntegration()->sendMessage(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "multipart/form-data": {
      "schema": {
        "type": "object",
        "required": [
          "file",
          "recipientBeAMailbox",
          "subject"
        ],
        "properties": {
          "file": {
            "type": "string",
            "format": "binary",
            "description": "Document file to send"
          },
          "recipientBeAMailbox": {
            "type": "string",
            "description": "Recipient beA mailbox address"
          },
          "subject": {
            "type": "string",
            "description": "Message subject"
          }
        }
      }
    }
  }
}
```


## `getMessage()`

Get single message details

```php
$client->beaIntegration()->getMessage(string $messageId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.messageId` (required): {"type": "string"}

## `downloadAttachment()`

Download message attachment

```php
$client->beaIntegration()->downloadAttachment(string $messageId, string $attachmentId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.messageId` (required): {"type": "string"}
- `path.attachmentId` (required): {"type": "string"}

## `replyToMessage()`

Reply to a beA message

```php
$client->beaIntegration()->replyToMessage(string $messageId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.messageId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "multipart/form-data": {
      "schema": {
        "type": "object",
        "required": [
          "file",
          "recipientBeAMailbox",
          "subject"
        ],
        "properties": {
          "file": {
            "type": "string",
            "format": "binary",
            "description": "Document file to attach to the reply"
          },
          "recipientBeAMailbox": {
            "type": "string",
            "description": "Recipient beA mailbox address"
          },
          "subject": {
            "type": "string",
            "description": "Reply subject"
          }
        }
      }
    }
  }
}
```


## `ingest()`

Ingest incoming beA message (internal)

```php
$client->beaIntegration()->ingest(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BeaIncomingDto"
      }
    }
  }
}
```

