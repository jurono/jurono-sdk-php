# Admin - Eventing

Access with `$client->adminEventing()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `health()` | `GET /api/admin/eventing/outbox/health` | `OutboxReprocessController_health` |
| `failed()` | `GET /api/admin/eventing/outbox/failed` | `OutboxReprocessController_failed` |
| `retryOne()` | `POST /api/admin/eventing/outbox/{id}/retry` | `OutboxReprocessController_retryOne` |
| `retryFailedBatch()` | `POST /api/admin/eventing/outbox/retry-failed` | `OutboxReprocessController_retryFailedBatch` |
| `listProcessed()` | `GET /api/admin/eventing/outbox/consumers/processed` | `OutboxReprocessController_listProcessed` |
| `replayConsumerEvent()` | `POST /api/admin/eventing/outbox/consumers/{consumerName}/events/{eventId}/replay` | `OutboxReprocessController_replayConsumerEvent` |
| `replayConsumerBatch()` | `POST /api/admin/eventing/outbox/consumers/{consumerName}/replay-batch` | `OutboxReprocessController_replayConsumerBatch` |

## `health()`

Get privacy-safe outbox operational health

```php
$client->adminEventing()->health(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `failed()`

List failed outbox events

```php
$client->adminEventing()->failed(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"type": "number"}
- `query.type` (optional): {"type": "string"}

## `retryOne()`

Retry one failed outbox event

```php
$client->adminEventing()->retryOne(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `retryFailedBatch()`

Retry a batch of failed outbox events

```php
$client->adminEventing()->retryFailedBatch(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"type": "number"}
- `query.type` (optional): {"type": "string"}

## `listProcessed()`

List processed consumer event markers

```php
$client->adminEventing()->listProcessed(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"type": "number"}
- `query.consumerName` (optional): {"type": "string"}

## `replayConsumerEvent()`

Allow one consumer event to be reprocessed

```php
$client->adminEventing()->replayConsumerEvent(string $consumerName, string $eventId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.consumerName` (required): {"type": "string"}
- `path.eventId` (required): {"type": "string"}

## `replayConsumerBatch()`

Allow a batch of consumer events to be reprocessed

```php
$client->adminEventing()->replayConsumerBatch(string $consumerName, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.consumerName` (required): {"type": "string"}
- `query.limit` (optional): {"type": "number"}
