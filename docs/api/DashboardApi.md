# Dashboard

Access with `$client->dashboard()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getActions()` | `GET /api/dashboard/actions` | `DashboardController_getActions` |
| `getMetrics()` | `GET /api/dashboard/metrics` | `DashboardController_getMetrics` |
| `getActivity()` | `GET /api/dashboard/activity` | `DashboardController_getActivity` |
| `getDeadlines()` | `GET /api/dashboard/deadlines` | `DashboardController_getDeadlines` |

## `getActions()`

Get role-aware action-center projection

```php
$client->dashboard()->getActions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"example": 20, "type": "number"}
- `query.role` (optional): {"enum": ["LAWYER", "RENO", "ACCOUNTANT", "ANY_FIRM_USER"], "type": "string"}

## `getMetrics()`

Get dashboard metrics with trends

```php
$client->dashboard()->getMetrics(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.startDate` (optional): {"type": "string"}
- `query.endDate` (optional): {"type": "string"}

## `getActivity()`

Get recent organization activity

```php
$client->dashboard()->getActivity(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"example": 20, "type": "number"}

## `getDeadlines()`

Get upcoming and overdue deadlines

```php
$client->dashboard()->getDeadlines(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"example": 20, "type": "number"}
- `query.days` (optional): {"example": 30, "type": "number"}
