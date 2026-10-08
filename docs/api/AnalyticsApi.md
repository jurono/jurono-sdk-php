# Analytics

Access with `$client->analytics()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `logRequest()` | `POST /api/analytics/log` | `AnalyticsController_logRequest` |
| `health()` | `GET /api/analytics/health` | `AnalyticsController_health` |
| `dashboard()` | `GET /api/analytics/dashboard` | `AnalyticsController_dashboard` |
| `events()` | `GET /api/analytics/events` | `AnalyticsController_events` |
| `track()` | `POST /api/analytics/track` | `AnalyticsController_track` |
| `generateReport()` | `POST /api/analytics/reports` | `AnalyticsController_generateReport` |
| `funnel()` | `POST /api/analytics/funnel` | `AnalyticsController_funnel` |
| `cohorts()` | `GET /api/analytics/cohorts` | `AnalyticsController_cohorts` |
| `performance()` | `GET /api/analytics/performance` | `AnalyticsController_performance` |
| `realtime()` | `GET /api/analytics/realtime` | `AnalyticsController_realtime` |

## `logRequest()`

Log a server-side request

```php
$client->analytics()->logRequest(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LogRequestDto"
      }
    }
  }
}
```


## `health()`

Health check

```php
$client->analytics()->health(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `dashboard()`

Get dashboard metrics

```php
$client->analytics()->dashboard(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.organizationId` (optional): {"format": "uuid"}
- `query.days` (optional): {"minimum": 1, "maximum": 365}

## `events()`

Get analytics events

```php
$client->analytics()->events(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.userId` (optional): {"format": "uuid"}
- `query.organizationId` (optional): {"format": "uuid"}
- `query.event` (optional): {"type": "string"}
- `query.startDate` (optional): {"format": "date-time"}
- `query.endDate` (optional): {"format": "date-time"}
- `query.limit` (optional): {"minimum": 1, "maximum": 1000}
- `query.offset` (optional): {"minimum": 0}

## `track()`

Track custom event

```php
$client->analytics()->track(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/TrackEventDto"
      }
    }
  }
}
```


## `generateReport()`

Generate analytics report

```php
$client->analytics()->generateReport(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/GenerateReportDto"
      }
    }
  }
}
```


## `funnel()`

Get funnel analysis

```php
$client->analytics()->funnel(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/FunnelDto"
      }
    }
  }
}
```


## `cohorts()`

Get cohort analysis

```php
$client->analytics()->cohorts(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.type` (optional): {"enum": ["weekly", "monthly"], "type": "string"}
- `query.periods` (optional): {"minimum": 1, "maximum": 36}

## `performance()`

Get performance analytics

```php
$client->analytics()->performance(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.timeframe` (optional): {"enum": ["1h", "6h", "24h", "7d"], "type": "string"}

## `realtime()`

Get real-time analytics

```php
$client->analytics()->realtime(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
