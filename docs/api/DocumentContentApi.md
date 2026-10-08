# Document Content

Access with `$client->documentContent()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/documents/content` | `DocumentContentController_list` |
| `create()` | `POST /api/documents/content` | `DocumentContentController_create` |
| `getById()` | `GET /api/documents/content/{id}` | `DocumentContentController_getById` |
| `update()` | `PUT /api/documents/content/{id}` | `DocumentContentController_update` |
| `delete()` | `DELETE /api/documents/content/{id}` | `DocumentContentController_delete` |
| `export()` | `GET /api/documents/content/{id}/export/{format}` | `DocumentContentController_export` |
| `getVersions()` | `GET /api/documents/content/{id}/versions` | `DocumentContentController_getVersions` |
| `restoreVersion()` | `POST /api/documents/content/{id}/versions/{version}/restore` | `DocumentContentController_restoreVersion` |
| `getAuditLog()` | `GET /api/documents/content/{id}/audit` | `DocumentContentController_getAuditLog` |
| `duplicate()` | `POST /api/documents/content/{id}/duplicate` | `DocumentContentController_duplicate` |
| `getCopilotHints()` | `GET /api/documents/content/{id}/copilot` | `DocumentContentController_getCopilotHints` |
| `acceptCopilotHint()` | `POST /api/documents/content/{id}/copilot/accept` | `DocumentContentController_acceptCopilotHint` |
| `aiRewrite()` | `POST /api/documents/content/{id}/ai/rewrite` | `DocumentContentController_aiRewrite` |
| `getHealth()` | `GET /api/documents/content/{id}/health` | `DocumentContentController_getHealth` |
| `listComments()` | `GET /api/documents/content/{id}/comments` | `DocumentContentController_listComments` |
| `createComment()` | `POST /api/documents/content/{id}/comments` | `DocumentContentController_createComment` |
| `resolveComment()` | `PATCH /api/documents/content/{id}/comments/{commentId}/resolve` | `DocumentContentController_resolveComment` |
| `createTaskFromComment()` | `POST /api/documents/content/{id}/comments/{commentId}/tasks` | `DocumentContentController_createTaskFromComment` |

## `list()`

List document contents

```php
$client->documentContent()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.page` (optional): {"type": "number"}
- `query.pageSize` (optional): {"type": "number"}
- `query.mandateId` (optional): {"type": "string"}
- `query.clientId` (optional): {"type": "string"}
- `query.search` (optional): {"type": "string"}
- `query.status` (optional): {"enum": ["DRAFT", "REVIEW", "FINAL", "SIGNED", "SUBMITTED", "ARCHIVED"], "type": "string"}
- `query.type` (optional): {"enum": ["CONTRACT", "PLEADING", "CORRESPONDENCE", "POWER_OF_ATTORNEY", "MANDATE_AGREEMENT", "WILL", "NOTARIAL", "OPINION", "MEMO", "OTHER"], "type": "string"}

## `create()`

Create new document content

```php
$client->documentContent()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateDocumentContentDto"
      }
    }
  }
}
```


## `getById()`

Get document content by ID

```php
$client->documentContent()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update document content

```php
$client->documentContent()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateDocumentContentDto"
      }
    }
  }
}
```


## `delete()`

Delete document content

```php
$client->documentContent()->delete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `export()`

Export document content to HTML, PDF, DOCX, RTF, or text

```php
$client->documentContent()->export(string $id, string $format, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.format` (required): {"type": "string"}

## `getVersions()`

Get version history

```php
$client->documentContent()->getVersions(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `restoreVersion()`

Restore to a specific version

```php
$client->documentContent()->restoreVersion(string $id, string $version, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.version` (required): {"type": "string"}

## `getAuditLog()`

Get audit log for document

```php
$client->documentContent()->getAuditLog(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.page` (optional): {"type": "number"}
- `query.pageSize` (optional): {"type": "number"}

## `duplicate()`

Duplicate a document

```php
$client->documentContent()->duplicate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getCopilotHints()`

Get rule-based and AI copilot hints for a document

```php
$client->documentContent()->getCopilotHints(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `acceptCopilotHint()`

Accept a copilot hint and create a linked task

```php
$client->documentContent()->acceptCopilotHint(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AcceptCopilotHintDto"
      }
    }
  }
}
```


## `aiRewrite()`

Request an AI rewrite for a selected text range

```php
$client->documentContent()->aiRewrite(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AiRewriteRequestDto"
      }
    }
  }
}
```


## `getHealth()`

Get document health checks

```php
$client->documentContent()->getHealth(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listComments()`

List inline comments for a document

```php
$client->documentContent()->listComments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createComment()`

Add an inline comment to a document block

```php
$client->documentContent()->createComment(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateDocumentContentCommentDto"
      }
    }
  }
}
```


## `resolveComment()`

Resolve an inline comment

```php
$client->documentContent()->resolveComment(string $id, string $commentId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.commentId` (required): {"type": "string"}

## `createTaskFromComment()`

Convert an inline comment into a task

```php
$client->documentContent()->createTaskFromComment(string $id, string $commentId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.commentId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateTaskFromCommentDto"
      }
    }
  }
}
```

