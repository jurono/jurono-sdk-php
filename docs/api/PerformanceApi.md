# Performance

Access with `$client->performance()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `metrics()` | `GET /api/performance/metrics` | `PerformanceController_metrics` |
| `database()` | `GET /api/performance/database` | `PerformanceController_database` |
| `cacheStats()` | `GET /api/performance/cache` | `PerformanceController_cacheStats` |
| `tasks()` | `GET /api/performance/tasks` | `PerformanceController_tasks` |

## `metrics()`

PerformanceController_metrics

```php
$client->performance()->metrics(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `database()`

PerformanceController_database

```php
$client->performance()->database(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `cacheStats()`

PerformanceController_cacheStats

```php
$client->performance()->cacheStats(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `tasks()`

PerformanceController_tasks

```php
$client->performance()->tasks(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

