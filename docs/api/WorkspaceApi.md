# Workspace

Access with `$client->workspace()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createDocument()` | `POST /api/mandates/{mandateId}/workspace/documents` | `WorkspaceController_createDocument` |
| `refreshVariables()` | `POST /api/mandates/{mandateId}/workspace/documents/{documentContentId}/refresh-variables` | `WorkspaceController_refreshVariables` |

## `createDocument()`

Create a document from mandate context

```php
$client->workspace()->createDocument(string $mandateId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateWorkspaceDocumentDto"
      }
    }
  }
}
```


## `refreshVariables()`

Refresh document variables from mandate context

```php
$client->workspace()->refreshVariables(string $mandateId, string $documentContentId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.mandateId` (required): {"type": "string"}
- `path.documentContentId` (required): {"type": "string"}
