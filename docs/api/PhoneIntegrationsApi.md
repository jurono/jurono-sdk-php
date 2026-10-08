# Phone Integrations

Access with `$client->phoneIntegrations()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listConnections()` | `GET /api/phone-integrations` | `PhoneIntegrationsController_listConnections` |
| `createConnection()` | `POST /api/phone-integrations` | `PhoneIntegrationsController_createConnection` |
| `updateConnection()` | `PATCH /api/phone-integrations/{id}` | `PhoneIntegrationsController_updateConnection` |
| `deleteConnection()` | `DELETE /api/phone-integrations/{id}` | `PhoneIntegrationsController_deleteConnection` |
| `listCalls()` | `GET /api/phone-calls` | `PhoneIntegrationsController_listCalls` |
| `getCall()` | `GET /api/phone-calls/{id}` | `PhoneIntegrationsController_getCall` |
| `updateStatus()` | `PATCH /api/phone-calls/{id}/status` | `PhoneIntegrationsController_updateStatus` |
| `linkClient()` | `POST /api/phone-calls/{id}/link-client` | `PhoneIntegrationsController_linkClient` |
| `linkMandate()` | `POST /api/phone-calls/{id}/link-mandate` | `PhoneIntegrationsController_linkMandate` |
| `createTask()` | `POST /api/phone-calls/{id}/create-task` | `PhoneIntegrationsController_createTask` |
| `createInquiry()` | `POST /api/phone-calls/{id}/create-inquiry` | `PhoneIntegrationsController_createInquiry` |
| `sipgateWebhook()` | `POST /api/integrations/phone/sipgate/webhook/{connectionId}` | `PhoneIntegrationsController_sipgateWebhook` |

## `listConnections()`

List phone provider connections

```php
$client->phoneIntegrations()->listConnections(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createConnection()`

Create a phone provider connection

```php
$client->phoneIntegrations()->createConnection(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreatePhoneIntegrationDto"
      }
    }
  }
}
```


## `updateConnection()`

Update a phone provider connection

```php
$client->phoneIntegrations()->updateConnection(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdatePhoneIntegrationDto"
      }
    }
  }
}
```


## `deleteConnection()`

Disable a phone provider connection

```php
$client->phoneIntegrations()->deleteConnection(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listCalls()`

List phone calls for organization

```php
$client->phoneIntegrations()->listCalls(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (optional): {"type": "string", "enum": ["RINGING", "ANSWERED", "MISSED", "VOICEMAIL", "RECORDED", "TRANSCRIBED", "FAILED", "RESOLVED", "HIDDEN"]}
- `query.mandateId` (optional): {"type": "string"}
- `query.clientId` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "string"}

## `getCall()`

Get phone call details

```php
$client->phoneIntegrations()->getCall(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `updateStatus()`

Resolve or hide a phone call

```php
$client->phoneIntegrations()->updateStatus(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdatePhoneCallStatusDto"
      }
    }
  }
}
```


## `linkClient()`

Link a phone call to a client

```php
$client->phoneIntegrations()->linkClient(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LinkPhoneCallDto"
      }
    }
  }
}
```


## `linkMandate()`

Link a phone call to a mandate

```php
$client->phoneIntegrations()->linkMandate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LinkPhoneCallDto"
      }
    }
  }
}
```


## `createTask()`

Create a callback task from a phone call

```php
$client->phoneIntegrations()->createTask(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createInquiry()`

Create an intake inquiry from a phone call

```php
$client->phoneIntegrations()->createInquiry(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `sipgateWebhook()`

Receive Sipgate phone webhook

```php
$client->phoneIntegrations()->sipgateWebhook(string $connectionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.connectionId` (required): {"type": "string"}
- `query.secret` (required): {"type": "string"}
