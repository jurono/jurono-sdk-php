# Mandates

Access with `$client->mandates()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/mandates` | `MandatesController_list` |
| `getEngagementPackageSettings()` | `GET /api/mandates/engagement-package/settings` | `MandatesController_getEngagementPackageSettings` |
| `updateEngagementPackageSettings()` | `PUT /api/mandates/engagement-package/settings` | `MandatesController_updateEngagementPackageSettings` |
| `getById()` | `GET /api/mandates/{id}` | `MandatesController_getById` |
| `proposeEngagementPackage()` | `GET /api/mandates/{id}/engagement-package/proposal` | `MandatesController_proposeEngagementPackage` |
| `createEngagementPackage()` | `POST /api/mandates/{id}/engagement-package` | `MandatesController_createEngagementPackage` |
| `getEngagementPackage()` | `GET /api/mandates/{id}/engagement-package` | `MandatesController_getEngagementPackage` |
| `resendEngagementPackageRequest()` | `POST /api/mandates/{id}/engagement-package/requests/{requestId}/resend` | `MandatesController_resendEngagementPackageRequest` |
| `getFinancialLedger()` | `GET /api/mandates/{id}/finance` | `MandatesController_getFinancialLedger` |
| `createFinancialLedgerEntry()` | `POST /api/mandates/{id}/finance/entries` | `MandatesController_createFinancialLedgerEntry` |
| `correctFinancialLedgerEntry()` | `POST /api/mandates/{id}/finance/entries/{entryId}/corrections` | `MandatesController_correctFinancialLedgerEntry` |
| `applyFinancialLedgerEntryToInvoice()` | `POST /api/mandates/{id}/finance/entries/{entryId}/apply-to-invoice` | `MandatesController_applyFinancialLedgerEntryToInvoice` |
| `updatePricing()` | `POST /api/mandates/{id}/pricing` | `MandatesController_updatePricing` |
| `generateContract()` | `POST /api/mandates/{id}/contract/generate` | `MandatesController_generateContract` |
| `customizeContract()` | `PUT /api/mandates/{id}/contract` | `MandatesController_customizeContract` |
| `negotiate()` | `POST /api/mandates/{id}/negotiate` | `MandatesController_negotiate` |
| `accept()` | `POST /api/mandates/{id}/accept` | `MandatesController_accept` |
| `decline()` | `POST /api/mandates/{id}/decline` | `MandatesController_decline` |
| `sign()` | `POST /api/mandates/{id}/sign` | `MandatesController_sign` |
| `finalize()` | `POST /api/mandates/{id}/contract/finalize` | `MandatesController_finalize` |
| `generatePdf()` | `POST /api/mandates/{id}/contract/pdf` | `MandatesController_generatePdf` |
| `getActivity()` | `GET /api/mandates/{id}/activity` | `MandatesController_getActivity` |
| `processDocument()` | `POST /api/mandates/process-document` | `MandatesController_processDocument` |
| `importMandates()` | `POST /api/mandates/import` | `MandatesController_importMandates` |
| `exportMandates()` | `POST /api/mandates/export` | `MandatesController_exportMandates` |
| `exportMandateToPDF()` | `GET /api/mandates/{id}/export-pdf` | `MandatesController_exportMandateToPDF` |

## `list()`

List mandates with advanced filters and sorting

```php
$client->mandates()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"example": "Mietrecht Berlin", "type": "string"}
- `query.clientId` (optional): {"example": "550e8400-e29b-41d4-a716-446655440000", "type": "string"}
- `query.assignedTo` (optional): {"example": "550e8400-e29b-41d4-a716-446655440001", "type": "string"}
- `query.status` (optional): {"type": "string", "enum": ["INTAKE", "PENDING", "IN_PROGRESS", "ON_HOLD", "COMPLETED", "CANCELLED", "ARCHIVED"]}
- `query.priority` (optional): {"type": "string", "enum": ["LOW", "NORMAL", "HIGH", "URGENT"]}
- `query.createdAfter` (optional): {"example": "2025-01-01T00:00:00Z", "type": "string"}
- `query.createdBefore` (optional): {"example": "2025-12-31T23:59:59Z", "type": "string"}
- `query.sortBy` (optional): {"default": "createdAt", "type": "string", "enum": ["createdAt", "updatedAt", "priority", "title"]}
- `query.sortOrder` (optional): {"default": "DESC", "type": "string", "enum": ["ASC", "DESC"]}
- `query.offset` (optional): {"default": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "type": "number"}

## `getEngagementPackageSettings()`

Get reusable engagement package template settings

```php
$client->mandates()->getEngagementPackageSettings(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateEngagementPackageSettings()`

Update reusable engagement package template settings

```php
$client->mandates()->updateEngagementPackageSettings(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateEngagementPackageSettingsDto"
      }
    }
  }
}
```


## `getById()`

Get mandate by ID

```php
$client->mandates()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `proposeEngagementPackage()`

Preview engagement package documents for a mandate

```php
$client->mandates()->proposeEngagementPackage(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createEngagementPackage()`

Generate and send an immutable engagement package for a mandate

```php
$client->mandates()->createEngagementPackage(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getEngagementPackage()`

Get mandate engagement package status and readiness

```php
$client->mandates()->getEngagementPackage(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `resendEngagementPackageRequest()`

Resend an engagement package request idempotently

```php
$client->mandates()->resendEngagementPackageRequest(string $id, string $requestId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.requestId` (required): {"type": "string"}

## `getFinancialLedger()`

Get matter financial ledger summary

```php
$client->mandates()->getFinancialLedger(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createFinancialLedgerEntry()`

Record an immutable matter financial ledger entry

```php
$client->mandates()->createFinancialLedgerEntry(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateMatterLedgerEntryDto"
      }
    }
  }
}
```


## `correctFinancialLedgerEntry()`

Record a reasoned correction for a matter financial ledger entry

```php
$client->mandates()->correctFinancialLedgerEntry(string $id, string $entryId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.entryId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CorrectMatterLedgerEntryDto"
      }
    }
  }
}
```


## `applyFinancialLedgerEntryToInvoice()`

Add a captured matter finance entry to a draft invoice

```php
$client->mandates()->applyFinancialLedgerEntryToInvoice(string $id, string $entryId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.entryId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ApplyMatterLedgerEntryToInvoiceDto"
      }
    }
  }
}
```


## `updatePricing()`

Update mandate pricing

```php
$client->mandates()->updatePricing(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdatePricingDto"
      }
    }
  }
}
```


## `generateContract()`

Generate contract preview

```php
$client->mandates()->generateContract(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ContractGenerateDto"
      }
    }
  }
}
```


## `customizeContract()`

Customize contract content

```php
$client->mandates()->customizeContract(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ContractCustomizeDto"
      }
    }
  }
}
```


## `negotiate()`

Add negotiation message

```php
$client->mandates()->negotiate(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/NegotiateDto"
      }
    }
  }
}
```


## `accept()`

Accept mandate with optional notes

```php
$client->mandates()->accept(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": false,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AcceptMandateDto"
      }
    }
  }
}
```


## `decline()`

Decline mandate with required reason

```php
$client->mandates()->decline(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DeclineMandateDto"
      }
    }
  }
}
```


## `sign()`

Record signature

```php
$client->mandates()->sign(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `finalize()`

Finalize contract and save as document

```php
$client->mandates()->finalize(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/FinalizeContractDto"
      }
    }
  }
}
```


## `generatePdf()`

Generate contract PDF from template

```php
$client->mandates()->generatePdf(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/GenerateContractPdfDto"
      }
    }
  }
}
```


## `getActivity()`

Get activity timeline for a mandate

```php
$client->mandates()->getActivity(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.eventType` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}

## `processDocument()`

Process document with AI to extract mandate data (PDF or image)

```php
$client->mandates()->processDocument(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "multipart/form-data": {
      "schema": {
        "type": "object",
        "properties": {
          "file": {
            "type": "string",
            "format": "binary",
            "description": "PDF or image file to process"
          }
        }
      }
    }
  }
}
```


## `importMandates()`

Import mandates from CSV or JSON file

```php
$client->mandates()->importMandates(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "multipart/form-data": {
      "schema": {
        "type": "object",
        "properties": {
          "file": {
            "type": "string",
            "format": "binary",
            "description": "CSV or JSON file with mandate data"
          },
          "lawyerId": {
            "type": "string",
            "description": "Lawyer ID to assign imported mandates to"
          }
        }
      }
    }
  }
}
```


## `exportMandates()`

Export mandates to CSV, JSON, or PDF format

```php
$client->mandates()->exportMandates(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ExportMandatesDto"
      }
    }
  }
}
```


## `exportMandateToPDF()`

Export single mandate as PDF report

```php
$client->mandates()->exportMandateToPDF(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
