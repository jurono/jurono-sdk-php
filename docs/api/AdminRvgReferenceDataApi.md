# Admin - RVG Reference Data

Access with `$client->adminRvgReferenceData()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getHealth()` | `GET /api/admin/rvg/reference-data/health` | `RvgReferenceController_getHealth` |
| `syncNow()` | `POST /api/admin/rvg/reference-data/sync` | `RvgReferenceController_syncNow` |
| `listVersions()` | `GET /api/admin/rvg/reference-data/versions` | `RvgReferenceController_listVersions` |
| `getVersion()` | `GET /api/admin/rvg/reference-data/versions/{id}` | `RvgReferenceController_getVersion` |

## `getHealth()`

Get RVG reference-data synchronization health

```php
$client->adminRvgReferenceData()->getHealth(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `syncNow()`

Run RVG reference-data synchronization now

```php
$client->adminRvgReferenceData()->syncNow(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listVersions()`

List RVG reference-data versions

```php
$client->adminRvgReferenceData()->listVersions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getVersion()`

Get RVG reference-data version details

```php
$client->adminRvgReferenceData()->getVersion(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
