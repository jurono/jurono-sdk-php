# Admin - Feature Flags

Access with `$client->adminFeatureFlags()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/feature-flags` | `FeatureFlagsController_list` |
| `upsert()` | `POST /api/feature-flags` | `FeatureFlagsController_upsert` |
| `toggle()` | `POST /api/feature-flags/{key}/toggle` | `FeatureFlagsController_toggle` |
| `listRules()` | `GET /api/feature-flags/{key}/rules` | `FeatureFlagsController_listRules` |
| `upsertRule()` | `POST /api/feature-flags/{key}/rules` | `FeatureFlagsController_upsertRule` |
| `deleteFlag()` | `DELETE /api/feature-flags/{key}` | `FeatureFlagsController_deleteFlag` |
| `deleteRule()` | `DELETE /api/feature-flags/{key}/rules/{id}` | `FeatureFlagsController_deleteRule` |

## `list()`

List all feature flags

```php
$client->adminFeatureFlags()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `upsert()`

Create or update a feature flag

```php
$client->adminFeatureFlags()->upsert(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `toggle()`

Toggle a feature flag on or off

```php
$client->adminFeatureFlags()->toggle(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `listRules()`

List rules for a feature flag

```php
$client->adminFeatureFlags()->listRules(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `upsertRule()`

Create or update a flag rule

```php
$client->adminFeatureFlags()->upsertRule(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `deleteFlag()`

Delete a feature flag

```php
$client->adminFeatureFlags()->deleteFlag(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `deleteRule()`

Delete a feature flag rule

```php
$client->adminFeatureFlags()->deleteRule(string $id, string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.key` (required): {"type": "string"}
