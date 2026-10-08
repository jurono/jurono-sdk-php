# Health

Access with `$client->health()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `check()` | `GET /health` | `HealthController_check` |
| `ready()` | `GET /health/ready` | `HealthController_ready` |

## `check()`

HealthController_check

```php
$client->health()->check(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `ready()`

HealthController_ready

```php
$client->health()->ready(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

