# Public Efficiency Check

Access with `$client->publicEfficiencyCheck()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `calculate()` | `POST /api/public/efficiency-check/calculate` | `EfficiencyCheckController_calculate` |
| `analyse()` | `POST /api/public/efficiency-check/analyse` | `EfficiencyCheckController_analyse` |
| `report()` | `POST /api/public/efficiency-check/report` | `EfficiencyCheckController_report` |
| `getResult()` | `GET /api/public/efficiency-check/result/{token}` | `EfficiencyCheckController_getResult` |

## `calculate()`

Calculate and persist a public efficiency-check assessment

```php
$client->publicEfficiencyCheck()->calculate(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/EfficiencyCheckRequestDto"
      }
    }
  }
}
```


## `analyse()`

Return deterministic fallback analysis for an assessment

```php
$client->publicEfficiencyCheck()->analyse(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/EfficiencyAnalysisRequestDto"
      }
    }
  }
}
```


## `report()`

Request report delivery for a completed assessment

```php
$client->publicEfficiencyCheck()->report(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/EfficiencyReportRequestDto"
      }
    }
  }
}
```


## `getResult()`

Read a shareable efficiency-check result by token

```php
$client->publicEfficiencyCheck()->getResult(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}
