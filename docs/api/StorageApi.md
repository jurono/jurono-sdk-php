# Storage

Access with `$client->storage()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `presignUpload()` | `POST /api/storage/presign/upload` | `StorageController_presignUpload` |
| `getPresignedPost()` | `POST /api/storage/presigned-post` | `StorageController_getPresignedPost` |
| `listDomains()` | `GET /api/storage/domains` | `StorageController_listDomains` |
| `presignDownload()` | `GET /api/storage/presign/download` | `StorageController_presignDownload` |
| `shareFile()` | `POST /api/storage/files/share` | `StorageController_shareFile` |
| `revokeShare()` | `DELETE /api/storage/files/share/{shareId}` | `StorageController_revokeShare` |
| `listFileShares()` | `GET /api/storage/files/{fileId}/shares` | `StorageController_listFileShares` |
| `downloadFile()` | `GET /api/storage/files/{fileId}/download` | `StorageController_downloadFile` |

## `presignUpload()`

Get presigned URL for file upload

```php
$client->storage()->presignUpload(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PresignUploadDto"
      }
    }
  }
}
```


## `getPresignedPost()`

Generate presigned POST URL for browser-direct S3 upload

```php
$client->storage()->getPresignedPost(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/GetPresignedPostDto"
      }
    }
  }
}
```


## `listDomains()`

List available storage domains

```php
$client->storage()->listDomains(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `presignDownload()`

Get presigned URL for file download

```php
$client->storage()->presignDownload(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.filename` (optional): {"type": "string"}
- `query.key` (required): {"type": "string"}

## `shareFile()`

Share a file with another tenant

```php
$client->storage()->shareFile(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ShareFileDto"
      }
    }
  }
}
```


## `revokeShare()`

Revoke a file share

```php
$client->storage()->revokeShare(string $shareId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.shareId` (required): {"type": "string"}

## `listFileShares()`

List shares for a file

```php
$client->storage()->listFileShares(string $fileId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.fileId` (required): {"type": "string"}

## `downloadFile()`

Get download URL for a file with access check

```php
$client->storage()->downloadFile(string $fileId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.fileId` (required): {"type": "string"}
