# Contract Templates

Access with `$client->contractTemplates()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/contract-templates` | `ContractTemplatesController_list` |
| `create()` | `POST /api/contract-templates` | `ContractTemplatesController_create` |
| `getById()` | `GET /api/contract-templates/{id}` | `ContractTemplatesController_getById` |
| `update()` | `PUT /api/contract-templates/{id}` | `ContractTemplatesController_update` |
| `softDelete()` | `DELETE /api/contract-templates/{id}` | `ContractTemplatesController_softDelete` |
| `createVersion()` | `POST /api/contract-templates/{id}/versions` | `ContractTemplatesController_createVersion` |
| `publishVersion()` | `POST /api/contract-templates/{id}/versions/{versionId}/publish` | `ContractTemplatesController_publishVersion` |
| `listVariables()` | `GET /api/contract-templates/{id}/variables` | `ContractTemplatesController_listVariables` |
| `upsertVariable()` | `POST /api/contract-templates/{id}/variables` | `ContractTemplatesController_upsertVariable` |
| `deleteVariable()` | `DELETE /api/contract-templates/{id}/variables/{variableId}` | `ContractTemplatesController_deleteVariable` |
| `generateDocument()` | `POST /api/contract-templates/{id}/generate` | `ContractTemplatesController_generateDocument` |
| `listDocuments()` | `GET /api/contract-templates/{id}/documents` | `ContractTemplatesController_listDocuments` |
| `finalizeDocument()` | `POST /api/contract-templates/{id}/documents/{docId}/finalize` | `ContractTemplatesController_finalizeDocument` |
| `generatePdf()` | `POST /api/contract-templates/{id}/pdf` | `ContractTemplatesController_generatePdf` |

## `list()`

List contract templates with optional filters

```php
$client->contractTemplates()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.practiceAreaId` (optional): {"type": "string"}
- `query.language` (optional): {"type": "string"}
- `query.isActive` (optional): {"type": "boolean"}
- `query.isPublished` (optional): {"type": "boolean"}
- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}
- `query.category` (optional): {"enum": ["CONTRACT", "LETTER", "MOTION", "AGREEMENT", "FORM", "OTHER"], "type": "string"}

## `create()`

Create a new contract template

```php
$client->contractTemplates()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "practiceAreaId",
          "name",
          "category"
        ],
        "properties": {
          "practiceAreaId": {
            "type": "string"
          },
          "name": {
            "type": "string"
          },
          "description": {
            "type": "string"
          },
          "category": {
            "type": "string",
            "enum": [
              "CONTRACT",
              "LETTER",
              "MOTION",
              "AGREEMENT",
              "FORM",
              "OTHER"
            ]
          },
          "language": {
            "type": "string",
            "default": "de"
          }
        }
      }
    }
  }
}
```


## `getById()`

Get a contract template by ID including current version and variables

```php
$client->contractTemplates()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update contract template metadata

```php
$client->contractTemplates()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "properties": {
          "name": {
            "type": "string"
          },
          "description": {
            "type": "string"
          },
          "category": {
            "type": "string",
            "enum": [
              "CONTRACT",
              "LETTER",
              "MOTION",
              "AGREEMENT",
              "FORM",
              "OTHER"
            ]
          },
          "language": {
            "type": "string"
          },
          "isActive": {
            "type": "boolean"
          },
          "isPublished": {
            "type": "boolean"
          }
        }
      }
    }
  }
}
```


## `softDelete()`

Soft delete a contract template

```php
$client->contractTemplates()->softDelete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createVersion()`

Create a new version for a template

```php
$client->contractTemplates()->createVersion(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "content",
          "contentJson"
        ],
        "properties": {
          "content": {
            "type": "string",
            "description": "HTML content for rendering"
          },
          "contentJson": {
            "type": "object",
            "description": "TipTap JSON for editing"
          },
          "changeNote": {
            "type": "string"
          }
        }
      }
    }
  }
}
```


## `publishVersion()`

Publish a template version and set it as the current version

```php
$client->contractTemplates()->publishVersion(string $id, string $versionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.versionId` (required): {"type": "string"}

## `listVariables()`

List all variables for a template

```php
$client->contractTemplates()->listVariables(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `upsertVariable()`

Add or replace a variable on a template (upsert by key)

```php
$client->contractTemplates()->upsertVariable(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "key",
          "label",
          "dataSource",
          "dataPath",
          "dataType",
          "category"
        ],
        "properties": {
          "key": {
            "type": "string",
            "description": "Unique variable key, e.g. client_name"
          },
          "label": {
            "type": "string"
          },
          "description": {
            "type": "string"
          },
          "dataSource": {
            "type": "string",
            "enum": [
              "MANDATE",
              "CLIENT",
              "LAWYER",
              "ORGANIZATION",
              "CUSTOM",
              "SYSTEM"
            ]
          },
          "dataPath": {
            "type": "string",
            "description": "JSON path, e.g. client.firstName"
          },
          "dataType": {
            "type": "string",
            "enum": [
              "TEXT",
              "NUMBER",
              "DATE",
              "CURRENCY",
              "BOOLEAN"
            ]
          },
          "isRequired": {
            "type": "boolean",
            "default": false
          },
          "defaultValue": {
            "type": "string"
          },
          "category": {
            "type": "string"
          },
          "sortOrder": {
            "type": "number",
            "default": 0
          }
        }
      }
    }
  }
}
```


## `deleteVariable()`

Remove a variable from a template

```php
$client->contractTemplates()->deleteVariable(string $id, string $variableId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.variableId` (required): {"type": "string"}

## `generateDocument()`

Generate a document from a template

```php
$client->contractTemplates()->generateDocument(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "variableData"
        ],
        "properties": {
          "templateVersionId": {
            "type": "string",
            "description": "Override version; defaults to current version"
          },
          "mandateId": {
            "type": "string"
          },
          "variableData": {
            "type": "object",
            "description": "Key-value snapshot of variable values"
          }
        }
      }
    }
  }
}
```


## `listDocuments()`

List generated documents for a template

```php
$client->contractTemplates()->listDocuments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `finalizeDocument()`

Finalize a generated document

```php
$client->contractTemplates()->finalizeDocument(string $id, string $docId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.docId` (required): {"type": "string"}

## `generatePdf()`

Generate PDF from contract template

```php
$client->contractTemplates()->generatePdf(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "properties": {
          "variableData": {
            "type": "object",
            "description": "Key-value pairs for Handlebars variable substitution"
          }
        }
      }
    }
  }
}
```
