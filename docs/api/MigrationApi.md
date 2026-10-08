# Migration

Access with `$client->migration()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listAdapters()` | `GET /api/migration/adapters` | `MigrationController_listAdapters` |
| `getCompatibility()` | `GET /api/migration/compatibility` | `MigrationController_getCompatibility` |
| `analyzeFile()` | `POST /api/migration/files/analyze` | `MigrationController_analyzeFile` |
| `analyzeVendorSnapshot()` | `POST /api/migration/connectors/{sourceSystem}/snapshots/analyze` | `MigrationController_analyzeVendorSnapshot` |
| `dryRun()` | `POST /api/migration/dry-run` | `MigrationController_dryRun` |
| `createImportJob()` | `POST /api/migration/import-jobs` | `MigrationController_createImportJob` |
| `getJob()` | `GET /api/migration/import-jobs/{id}` | `MigrationController_getJob` |
| `upsertDemand()` | `POST /api/migration/onboarding-demand` | `MigrationController_upsertDemand` |
| `getDemand()` | `GET /api/migration/onboarding-demand` | `MigrationController_getDemand` |
| `getDemandSummary()` | `GET /api/migration/admin/demand-summary` | `MigrationController_getDemandSummary` |
| `createConnectorConnection()` | `POST /api/migration/connectors/{sourceSystem}/connections` | `MigrationController_createConnectorConnection` |
| `createPortableExport()` | `POST /api/migration/export/portable` | `MigrationController_createPortableExport` |
| `getPortableExportStatus()` | `GET /api/migration/export/portable/{id}/status` | `MigrationController_getPortableExportStatus` |
| `downloadPortableExport()` | `GET /api/migration/export/portable/{id}/download` | `MigrationController_downloadPortableExport` |

## `listAdapters()`

MigrationController_listAdapters

```php
$client->migration()->listAdapters(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getCompatibility()`

MigrationController_getCompatibility

```php
$client->migration()->getCompatibility(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `analyzeFile()`

MigrationController_analyzeFile

```php
$client->migration()->analyzeFile(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AnalyzeMigrationFileDto"
      }
    }
  }
}
```


## `analyzeVendorSnapshot()`

MigrationController_analyzeVendorSnapshot

```php
$client->migration()->analyzeVendorSnapshot(string $sourceSystem, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.sourceSystem` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AnalyzeVendorSnapshotDto"
      }
    }
  }
}
```


## `dryRun()`

MigrationController_dryRun

```php
$client->migration()->dryRun(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DryRunMigrationDto"
      }
    }
  }
}
```


## `createImportJob()`

MigrationController_createImportJob

```php
$client->migration()->createImportJob(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateMigrationJobDto"
      }
    }
  }
}
```


## `getJob()`

MigrationController_getJob

```php
$client->migration()->getJob(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `upsertDemand()`

MigrationController_upsertDemand

```php
$client->migration()->upsertDemand(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpsertMigrationDemandDto"
      }
    }
  }
}
```


## `getDemand()`

MigrationController_getDemand

```php
$client->migration()->getDemand(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getDemandSummary()`

MigrationController_getDemandSummary

```php
$client->migration()->getDemandSummary(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createConnectorConnection()`

MigrationController_createConnectorConnection

```php
$client->migration()->createConnectorConnection(string $sourceSystem, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.sourceSystem` (required): {"type": "string"}

## `createPortableExport()`

MigrationController_createPortableExport

```php
$client->migration()->createPortableExport(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getPortableExportStatus()`

MigrationController_getPortableExportStatus

```php
$client->migration()->getPortableExportStatus(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `downloadPortableExport()`

MigrationController_downloadPortableExport

```php
$client->migration()->downloadPortableExport(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
