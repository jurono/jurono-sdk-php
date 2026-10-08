# Q&A Stats

Access with `$client->qAStats()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getMyStats()` | `GET /api/qa/stats/me` | `QaStatsController_getMyStats` |

## `getMyStats()`

Get own Q&A performance stats (lawyer)

```php
$client->qAStats()->getMyStats(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

