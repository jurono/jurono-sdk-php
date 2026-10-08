# DATEV Configuration

Access with `$client->datevConfiguration()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getConfig()` | `GET /api/datev/config` | `DatevConfigController_getConfig` |
| `createConfig()` | `POST /api/datev/config` | `DatevConfigController_createConfig` |
| `updateConfig()` | `PATCH /api/datev/config` | `DatevConfigController_updateConfig` |
| `deleteConfig()` | `DELETE /api/datev/config` | `DatevConfigController_deleteConfig` |
| `validateConfig()` | `POST /api/datev/config/validate` | `DatevConfigController_validateConfig` |

## `getConfig()`

Get DATEV configuration for organization

```php
$client->datevConfiguration()->getConfig(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createConfig()`

Create DATEV configuration

```php
$client->datevConfiguration()->createConfig(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateDatevConfigDto"
      }
    }
  }
}
```


## `updateConfig()`

Update DATEV configuration

```php
$client->datevConfiguration()->updateConfig(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateDatevConfigDto"
      }
    }
  }
}
```


## `deleteConfig()`

Delete DATEV configuration

```php
$client->datevConfiguration()->deleteConfig(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `validateConfig()`

Validate DATEV settings

```php
$client->datevConfiguration()->validateConfig(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ValidateDatevConfigDto"
      }
    }
  }
}
```
