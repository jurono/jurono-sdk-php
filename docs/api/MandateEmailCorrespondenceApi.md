# Mandate Email Correspondence

Access with `$client->mandateEmailCorrespondence()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listMailboxes()` | `GET /api/email/mandate-correspondence/mailboxes` | `MandateEmailCorrespondenceController_listMailboxes` |
| `createMicrosoftConnectUrl()` | `POST /api/email/mandate-correspondence/mailboxes/microsoft365/connect-url` | `MandateEmailCorrespondenceController_createMicrosoftConnectUrl` |
| `microsoftCallback()` | `GET /api/email/mandate-correspondence/mailboxes/microsoft365/callback` | `MandateEmailCorrespondenceController_microsoftCallback` |
| `connectMicrosoftMailbox()` | `POST /api/email/mandate-correspondence/mailboxes/microsoft365` | `MandateEmailCorrespondenceController_connectMicrosoftMailbox` |
| `revokeMailbox()` | `POST /api/email/mandate-correspondence/mailboxes/{id}/revoke` | `MandateEmailCorrespondenceController_revokeMailbox` |
| `syncMailbox()` | `POST /api/email/mandate-correspondence/mailboxes/{id}/sync` | `MandateEmailCorrespondenceController_syncMailbox` |
| `validateMicrosoftWebhook()` | `GET /api/email/mandate-correspondence/webhook/microsoft365` | `MandateEmailCorrespondenceController_validateMicrosoftWebhook` |
| `microsoftWebhook()` | `POST /api/email/mandate-correspondence/webhook/microsoft365` | `MandateEmailCorrespondenceController_microsoftWebhook` |
| `ingestInbound()` | `POST /api/email/mandate-correspondence/inbound` | `MandateEmailCorrespondenceController_ingestInbound` |
| `listExceptionInbox()` | `GET /api/email/mandate-correspondence/inbox` | `MandateEmailCorrespondenceController_listExceptionInbox` |
| `listMandateTimeline()` | `GET /api/email/mandate-correspondence/mandates/{mandateId}/timeline` | `MandateEmailCorrespondenceController_listMandateTimeline` |
| `assignToMandate()` | `POST /api/email/mandate-correspondence/items/{id}/assign` | `MandateEmailCorrespondenceController_assignToMandate` |
| `sendProviderReply()` | `POST /api/email/mandate-correspondence/mandates/{mandateId}/replies` | `MandateEmailCorrespondenceController_sendProviderReply` |
| `sendReply()` | `POST /api/email/mandate-correspondence/mandates/{mandateId}/replies/reconcile` | `MandateEmailCorrespondenceController_sendReply` |

## `listMailboxes()`

List Microsoft 365 mandate mailbox connections

```php
$client->mandateEmailCorrespondence()->listMailboxes(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createMicrosoftConnectUrl()`

Start Microsoft 365 OAuth for a mandate mailbox

```php
$client->mandateEmailCorrespondence()->createMicrosoftConnectUrl(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `microsoftCallback()`

Handle Microsoft 365 mailbox OAuth callback

```php
$client->mandateEmailCorrespondence()->microsoftCallback(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.code` (optional): {"type": "string"}
- `query.state` (optional): {"type": "string"}
- `query.error` (optional): {"type": "string"}

## `connectMicrosoftMailbox()`

Connect a Microsoft 365 mailbox for mandate correspondence

```php
$client->mandateEmailCorrespondence()->connectMicrosoftMailbox(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ConnectMandateMailboxDto"
      }
    }
  }
}
```


## `revokeMailbox()`

Revoke a mandate mailbox connection without deleting historical evidence

```php
$client->mandateEmailCorrespondence()->revokeMailbox(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `syncMailbox()`

Run Microsoft Graph delta sync for a mandate mailbox

```php
$client->mandateEmailCorrespondence()->syncMailbox(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `validateMicrosoftWebhook()`

Validate Microsoft Graph mailbox webhook subscription

```php
$client->mandateEmailCorrespondence()->validateMicrosoftWebhook(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.validationToken` (optional): {"type": "string"}

## `microsoftWebhook()`

Receive Microsoft Graph mailbox webhook notifications

```php
$client->mandateEmailCorrespondence()->microsoftWebhook(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.validationToken` (optional): {"type": "string"}

## `ingestInbound()`

Ingest a safe Microsoft Graph email envelope for mandate triage

```php
$client->mandateEmailCorrespondence()->ingestInbound(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/IngestMandateEmailDto"
      }
    }
  }
}
```


## `listExceptionInbox()`

List unassigned ambiguous or failed mandate email correspondence

```php
$client->mandateEmailCorrespondence()->listExceptionInbox(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listMandateTimeline()`

List assigned email correspondence for a mandate timeline

```php
$client->mandateEmailCorrespondence()->listMandateTimeline(string $mandateId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}

## `assignToMandate()`

Assign an email correspondence item to a mandate and create follow-up work

```php
$client->mandateEmailCorrespondence()->assignToMandate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AssignMandateEmailDto"
      }
    }
  }
}
```


## `sendProviderReply()`

Send a mandate-native email reply through Microsoft Graph

```php
$client->mandateEmailCorrespondence()->sendProviderReply(string $mandateId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SendMandateEmailProviderReplyDto"
      }
    }
  }
}
```


## `sendReply()`

Record a mandate-native email reply provider reconciliation state

```php
$client->mandateEmailCorrespondence()->sendReply(string $mandateId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SendMandateEmailReplyDto"
      }
    }
  }
}
```
