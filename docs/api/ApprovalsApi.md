# Approvals

Access with `$client->approvals()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createIntent()` | `POST /api/approvals/intent` | `ApprovalsController_createIntent` |
| `verifyIntent()` | `POST /api/approvals/verify` | `ApprovalsController_verifyIntent` |

## `createIntent()`

Create step-up intent and WebAuthn challenge for a high-risk action

```php
$client->approvals()->createIntent(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateApprovalIntentDto"
      }
    }
  }
}
```


## `verifyIntent()`

Verify step-up assertion and issue one-time approval token

```php
$client->approvals()->verifyIntent(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/VerifyApprovalDto"
      }
    }
  }
}
```
