# Security

Access with `$client->security()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `cspReport()` | `POST /api/security/csp-report` | `SecurityController_cspReport` |
| `reportTo()` | `POST /api/security/report` | `SecurityController_reportTo` |

## `cspReport()`

Receive CSP violation reports

```php
$client->security()->cspReport(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `reportTo()`

Receive Reporting API submissions

```php
$client->security()->reportTo(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

