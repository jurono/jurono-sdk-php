# Automation

Access with `$client->automation()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `manualLink()` | `POST /api/messages/{id}/link` | `BeaAutomationController_manualLink` |
| `markUnmatched()` | `POST /api/messages/{id}/unmatch` | `BeaAutomationController_markUnmatched` |
| `confirmDeadline()` | `POST /api/deadlines/{id}/confirm` | `BeaAutomationController_confirmDeadline` |
| `dismissDeadline()` | `POST /api/deadlines/{id}/dismiss` | `BeaAutomationController_dismissDeadline` |

## `manualLink()`

Manually link incoming message to mandate

```php
$client->automation()->manualLink(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ManualLinkDto"
      }
    }
  }
}
```


## `markUnmatched()`

Mark incoming message unrelated or unmatched

```php
$client->automation()->markUnmatched(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeadlineDecisionDto"
      }
    }
  }
}
```


## `confirmDeadline()`

Confirm proposed deadline

```php
$client->automation()->confirmDeadline(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeadlineDecisionDto"
      }
    }
  }
}
```


## `dismissDeadline()`

Dismiss proposed deadline

```php
$client->automation()->dismissDeadline(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeadlineDecisionDto"
      }
    }
  }
}
```

