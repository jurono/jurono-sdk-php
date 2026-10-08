# Stats

Access with `$client->stats()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `overview()` | `GET /api/stats/overview` | `StatsController_overview` |
| `practiceAreas()` | `GET /api/stats/practice-areas` | `StatsController_practiceAreas` |

## `overview()`

Public overview statistics

```php
$client->stats()->overview(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.country` (optional): {"type": "string"}
- `query.days` (optional): {"example": 30, "type": "number"}

## `practiceAreas()`

Practice areas statistics

```php
$client->stats()->practiceAreas(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.country` (optional): {"type": "string"}
- `query.latitude` (optional): {"type": "number"}
- `query.longitude` (optional): {"type": "number"}
- `query.radius` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}
