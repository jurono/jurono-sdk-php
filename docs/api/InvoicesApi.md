# Invoices

Access with `$client->invoices()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/invoices` | `InvoicesController_list` |
| `create()` | `POST /api/invoices` | `InvoicesController_create` |
| `getInvoiceTemplateSettings()` | `GET /api/invoices/settings/invoice-template` | `InvoicesController_getInvoiceTemplateSettings` |
| `updateInvoiceTemplateSettings()` | `PATCH /api/invoices/settings/invoice-template` | `InvoicesController_updateInvoiceTemplateSettings` |
| `getEditor()` | `GET /api/invoices/{id}/editor` | `InvoicesController_getEditor` |
| `getById()` | `GET /api/invoices/{id}` | `InvoicesController_getById` |
| `updateDraft()` | `PATCH /api/invoices/{id}` | `InvoicesController_updateDraft` |
| `getActiveRvgReferenceVersion()` | `GET /api/invoices/rvg/reference-version/active` | `InvoicesController_getActiveRvgReferenceVersion` |
| `calculateRvg()` | `POST /api/invoices/rvg/calculate` | `InvoicesController_calculateRvg` |
| `applyRvg()` | `POST /api/invoices/{id}/rvg/apply` | `InvoicesController_applyRvg` |
| `validate()` | `POST /api/invoices/{id}/validate` | `InvoicesController_validate` |
| `issue()` | `POST /api/invoices/{id}/issue` | `InvoicesController_issue` |
| `previewDatev()` | `POST /api/invoices/export/datev/preview` | `InvoicesController_previewDatev` |
| `exportDatev()` | `GET /api/invoices/export/datev.csv` | `InvoicesController_exportDatev` |
| `addItem()` | `POST /api/invoices/{id}/items` | `InvoicesController_addItem` |
| `updateItem()` | `PUT /api/invoices/{id}/items/{itemId}` | `InvoicesController_updateItem` |
| `deleteItem()` | `POST /api/invoices/{id}/items/{itemId}/delete` | `InvoicesController_deleteItem` |
| `markSent()` | `POST /api/invoices/{id}/mark-sent` | `InvoicesController_markSent` |
| `markPaid()` | `POST /api/invoices/{id}/mark-paid` | `InvoicesController_markPaid` |
| `recordPayment()` | `POST /api/invoices/{id}/payments` | `InvoicesController_recordPayment` |
| `cancel()` | `POST /api/invoices/{id}/cancel` | `InvoicesController_cancel` |
| `addDunningLevel()` | `POST /api/invoices/{id}/dunning-levels` | `InvoicesController_addDunningLevel` |
| `pdf()` | `GET /api/invoices/{id}/pdf` | `InvoicesController_pdf` |
| `downloadArtifact()` | `GET /api/invoices/{id}/artifacts/{artifactId}/download` | `InvoicesController_downloadArtifact` |

## `list()`

List invoices for organization

```php
$client->invoices()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `create()`

Create a new invoice

```php
$client->invoices()->create(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getInvoiceTemplateSettings()`

Get organization default invoice template settings

```php
$client->invoices()->getInvoiceTemplateSettings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateInvoiceTemplateSettings()`

Update organization default invoice template settings

```php
$client->invoices()->updateInvoiceTemplateSettings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getEditor()`

Get invoice editor state

```php
$client->invoices()->getEditor(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getById()`

Get invoice by ID

```php
$client->invoices()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `updateDraft()`

Update a draft invoice

```php
$client->invoices()->updateDraft(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getActiveRvgReferenceVersion()`

Get active RVG reference version metadata

```php
$client->invoices()->getActiveRvgReferenceVersion(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `calculateRvg()`

Preview an RVG fee calculation

```php
$client->invoices()->calculateRvg(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RvgCalculationRequestDto"
      }
    }
  }
}
```


## `applyRvg()`

Apply an RVG fee calculation to a draft invoice

```php
$client->invoices()->applyRvg(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RvgApplyRequestDto"
      }
    }
  }
}
```


## `validate()`

Validate invoice for issuing and e-invoice readiness

```php
$client->invoices()->validate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `issue()`

Issue invoice and generate PDF/XRechnung/ZUGFeRD artifacts

```php
$client->invoices()->issue(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `previewDatev()`

Preview DATEV invoice export rows

```php
$client->invoices()->previewDatev(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `exportDatev()`

Export invoices as DATEV CSV

```php
$client->invoices()->exportDatev(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.from` (required): {"type": "string"}
- `query.to` (required): {"type": "string"}

## `addItem()`

Add line item to invoice

```php
$client->invoices()->addItem(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `updateItem()`

Update invoice line item

```php
$client->invoices()->updateItem(string $id, string $itemId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.itemId` (required): {"type": "string"}

## `deleteItem()`

Delete invoice line item

```php
$client->invoices()->deleteItem(string $id, string $itemId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.itemId` (required): {"type": "string"}

## `markSent()`

Mark invoice as sent

```php
$client->invoices()->markSent(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `markPaid()`

Mark invoice as paid

```php
$client->invoices()->markPaid(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `recordPayment()`

Record a payment for an issued invoice

```php
$client->invoices()->recordPayment(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `cancel()`

Create a Storno invoice for an issued invoice

```php
$client->invoices()->cancel(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `addDunningLevel()`

Add dunning level to an issued invoice

```php
$client->invoices()->addDunningLevel(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `pdf()`

Download invoice as PDF

```php
$client->invoices()->pdf(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `downloadArtifact()`

Download generated invoice artifact

```php
$client->invoices()->downloadArtifact(string $id, string $artifactId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.artifactId` (required): {"type": "string"}
