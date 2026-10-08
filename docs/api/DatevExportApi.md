# DATEV Export

Access with `$client->datevExport()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `exportInvoices()` | `POST /api/datev/export/invoices` | `DatevExportController_exportInvoices` |
| `getExportStatus()` | `GET /api/datev/export/{id}/status` | `DatevExportController_getExportStatus` |
| `downloadExport()` | `GET /api/datev/export/{id}/download` | `DatevExportController_downloadExport` |
| `listExports()` | `GET /api/datev/export/jobs` | `DatevExportController_listExports` |
| `cancelExport()` | `POST /api/datev/export/{id}/cancel` | `DatevExportController_cancelExport` |
| `previewExport()` | `POST /api/datev/export/invoices/preview` | `DatevExportController_previewExport` |
| `previewCsv()` | `POST /api/datev/export/invoices/preview-csv` | `DatevExportController_previewCsv` |

## `exportInvoices()`

Export invoices to DATEV

```php
$client->datevExport()->exportInvoices(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExportJobDto"
      }
    }
  }
}
```


## `getExportStatus()`

Get export status

```php
$client->datevExport()->getExportStatus(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `downloadExport()`

Download export file

```php
$client->datevExport()->downloadExport(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listExports()`

List export jobs

```php
$client->datevExport()->listExports(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.exportType` (optional): {"type": "string", "enum": ["INVOICES", "TIME_ENTRIES", "CLIENTS", "COMPLETE"]}
- `query.status` (optional): {"example": "COMPLETED", "type": "string"}
- `query.limit` (optional): {"default": 20, "type": "number"}
- `query.offset` (optional): {"default": 0, "type": "number"}

## `cancelExport()`

Cancel export job

```php
$client->datevExport()->cancelExport(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `previewExport()`

Preview invoice export

```php
$client->datevExport()->previewExport(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExportJobDto"
      }
    }
  }
}
```


## `previewCsv()`

Generate CSV preview

```php
$client->datevExport()->previewCsv(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateExportJobDto"
      }
    }
  }
}
```
