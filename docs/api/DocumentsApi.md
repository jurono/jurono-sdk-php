# Documents

Access with `$client->documents()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/documents` | `DocumentsController_list` |
| `upload()` | `POST /api/documents` | `DocumentsController_upload` |
| `prefillContext()` | `GET /api/documents/prefill-context` | `DocumentsController_prefillContext` |
| `listByMandate()` | `GET /api/documents/mandate/{mandateId}` | `DocumentsController_listByMandate` |
| `formatCheck()` | `GET /api/documents/{id}/format-check` | `DocumentsController_formatCheck` |
| `versions()` | `GET /api/documents/{id}/versions` | `DocumentsController_versions` |
| `exportDocument()` | `GET /api/documents/{id}/export/{format}` | `DocumentsController_exportDocument` |
| `getById()` | `GET /api/documents/{id}` | `DocumentsController_getById` |
| `download()` | `GET /api/documents/{id}/download` | `DocumentsController_download` |
| `requestReview()` | `POST /api/documents/{id}/reviews` | `DocumentsController_requestReview` |
| `decideReview()` | `POST /api/documents/reviews/{reviewId}/decision` | `DocumentsController_decideReview` |
| `presignNewDocument()` | `POST /api/documents/presign` | `DocumentsController_presignNewDocument` |
| `presignDocumentVersion()` | `POST /api/documents/{id}/presign` | `DocumentsController_presignDocumentVersion` |
| `finalizeNewDocument()` | `POST /api/documents/finalize` | `DocumentsController_finalizeNewDocument` |
| `finalizeDocumentVersion()` | `POST /api/documents/{id}/finalize` | `DocumentsController_finalizeDocumentVersion` |
| `newVersion()` | `POST /api/documents/{id}/version` | `DocumentsController_newVersion` |
| `signedUrl()` | `GET /api/documents/{id}/signed-url` | `DocumentsController_signedUrl` |
| `downloadSigned()` | `GET /api/documents/download` | `DocumentsController_downloadSigned` |
| `shareDocument()` | `POST /api/documents/{id}/share` | `DocumentsController_shareDocument` |
| `delete()` | `POST /api/documents/{id}/delete` | `DocumentsController_delete` |
| `setRetention()` | `POST /api/documents/retention` | `DocumentsController_setRetention` |
| `getRetention()` | `GET /api/documents/retention` | `DocumentsController_getRetention` |
| `purge()` | `POST /api/documents/purge` | `DocumentsController_purge` |
| `exportXJustiz()` | `GET /api/documents/{id}/xjustiz` | `XJustizController_exportXJustiz` |

## `list()`

List documents for tenant

```php
$client->documents()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.limit` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "string"}

## `upload()`

Upload a new document

```php
$client->documents()->upload(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `prefillContext()`

Resolve law firm, lawyer, client, and mandate data for document drafts

```php
$client->documents()->prefillContext(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.mandateId` (optional): {"type": "string"}

## `listByMandate()`

List documents for a specific mandate

```php
$client->documents()->listByMandate(string $mandateId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}
- `query.category` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "string"}

## `formatCheck()`

Validate formal legal document requirements before export

```php
$client->documents()->formatCheck(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `versions()`

List all versions for a document chain

```php
$client->documents()->versions(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `exportDocument()`

Export a structured document as PDF, HTML, RTF, or plain text

```php
$client->documents()->exportDocument(string $id, string $format, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.format` (required): {"type": "string"}

## `getById()`

Get document by ID

```php
$client->documents()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `download()`

Download document file

```php
$client->documents()->download(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `requestReview()`

Request a document review for a specific document version

```php
$client->documents()->requestReview(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentReviewRequestDto"
      }
    }
  }
}
```


## `decideReview()`

Record a document review decision

```php
$client->documents()->decideReview(string $reviewId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.reviewId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentReviewDecisionDto"
      }
    }
  }
}
```


## `presignNewDocument()`

Get presigned upload for a new document

```php
$client->documents()->presignNewDocument(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentPresignRequestDto"
      }
    }
  }
}
```


## `presignDocumentVersion()`

Get presigned upload for a new document version

```php
$client->documents()->presignDocumentVersion(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentPresignRequestDto"
      }
    }
  }
}
```


## `finalizeNewDocument()`

Finalize a presigned document upload

```php
$client->documents()->finalizeNewDocument(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentFinalizeRequestDto"
      }
    }
  }
}
```


## `finalizeDocumentVersion()`

Finalize a presigned upload for a new version

```php
$client->documents()->finalizeDocumentVersion(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/DocumentFinalizeRequestDto"
      }
    }
  }
}
```


## `newVersion()`

Upload a new version of existing document

```php
$client->documents()->newVersion(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `signedUrl()`

Generate signed URL for document download

```php
$client->documents()->signedUrl(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `downloadSigned()`

Download document using signed token

```php
$client->documents()->downloadSigned(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.token` (required): {"type": "string"}

## `shareDocument()`

Share document with tenant or specific lawyer

```php
$client->documents()->shareDocument(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ShareDocumentDto"
      }
    }
  }
}
```


## `delete()`

Soft delete a document

```php
$client->documents()->delete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `setRetention()`

Set document retention policy

```php
$client->documents()->setRetention(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getRetention()`

Get document retention policy

```php
$client->documents()->getRetention(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `purge()`

Purge deleted documents based on retention policy

```php
$client->documents()->purge(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `exportXJustiz()`

Export document in xJustiz XML format

```php
$client->documents()->exportXJustiz(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
