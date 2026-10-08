# Admin - Storage Management

Access with `$client->adminStorageManagement()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listBuckets()` | `GET /api/admin/storage/buckets` | `AdminStorageController_listBuckets` |
| `createBucket()` | `POST /api/admin/storage/buckets` | `AdminStorageController_createBucket` |
| `getBucketInfo()` | `GET /api/admin/storage/buckets/{name}` | `AdminStorageController_getBucketInfo` |
| `deleteBucket()` | `DELETE /api/admin/storage/buckets/{name}` | `AdminStorageController_deleteBucket` |
| `setBucketPolicy()` | `PUT /api/admin/storage/buckets/{name}/policy` | `AdminStorageController_setBucketPolicy` |
| `setBucketVersioning()` | `PUT /api/admin/storage/buckets/{name}/versioning` | `AdminStorageController_setBucketVersioning` |
| `setBucketQuota()` | `PUT /api/admin/storage/buckets/{name}/quota` | `AdminStorageController_setBucketQuota` |
| `removeBucketQuota()` | `DELETE /api/admin/storage/buckets/{name}/quota` | `AdminStorageController_removeBucketQuota` |
| `setLifecyclePolicy()` | `PUT /api/admin/storage/buckets/{name}/lifecycle` | `AdminStorageController_setLifecyclePolicy` |
| `getBucketStats()` | `GET /api/admin/storage/buckets/{name}/stats` | `AdminStorageController_getBucketStats` |
| `listObjects()` | `GET /api/admin/storage/buckets/{name}/objects` | `AdminStorageController_listObjects` |
| `getStorageOverview()` | `GET /api/admin/storage/overview` | `AdminStorageController_getStorageOverview` |
| `checkHealth()` | `GET /api/admin/storage/health` | `AdminStorageController_checkHealth` |
| `getStorageConfig()` | `GET /api/admin/storage/config` | `AdminStorageController_getStorageConfig` |

## `listBuckets()`

List all storage buckets

```php
$client->adminStorageManagement()->listBuckets(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createBucket()`

Create a new storage bucket

```php
$client->adminStorageManagement()->createBucket(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateBucketDto"
      }
    }
  }
}
```


## `getBucketInfo()`

Get storage bucket info

```php
$client->adminStorageManagement()->getBucketInfo(string $name, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

## `deleteBucket()`

Delete a storage bucket

```php
$client->adminStorageManagement()->deleteBucket(string $name, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}
- `query.force` (required): {"type": "string"}

## `setBucketPolicy()`

Set bucket access policy

```php
$client->adminStorageManagement()->setBucketPolicy(string $name, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SetBucketPolicyDto"
      }
    }
  }
}
```


## `setBucketVersioning()`

Configure bucket versioning

```php
$client->adminStorageManagement()->setBucketVersioning(string $name, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SetBucketVersioningDto"
      }
    }
  }
}
```


## `setBucketQuota()`

Set bucket storage quota

```php
$client->adminStorageManagement()->setBucketQuota(string $name, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SetBucketQuotaDto"
      }
    }
  }
}
```


## `removeBucketQuota()`

Remove bucket storage quota

```php
$client->adminStorageManagement()->removeBucketQuota(string $name, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

## `setLifecyclePolicy()`

Set bucket lifecycle policy

```php
$client->adminStorageManagement()->setLifecyclePolicy(string $name, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SetLifecyclePolicyDto"
      }
    }
  }
}
```


## `getBucketStats()`

Get bucket usage statistics

```php
$client->adminStorageManagement()->getBucketStats(string $name, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}

## `listObjects()`

List objects in a storage bucket

```php
$client->adminStorageManagement()->listObjects(string $name, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.name` (required): {"type": "string"}
- `query.prefix` (required): {"type": "string"}
- `query.maxKeys` (required): {"type": "string"}

## `getStorageOverview()`

Get storage usage overview across all buckets

```php
$client->adminStorageManagement()->getStorageOverview(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `checkHealth()`

Check S3/storage connectivity and health

```php
$client->adminStorageManagement()->checkHealth(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getStorageConfig()`

Get storage configuration (configured buckets and domains)

```php
$client->adminStorageManagement()->getStorageConfig(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
