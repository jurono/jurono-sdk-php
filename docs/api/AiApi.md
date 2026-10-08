# AI

Access with `$client->ai()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `analyzeDocument()` | `POST /api/ai/document-processing/analyze` | `AiController_analyzeDocument` |

## `analyzeDocument()`

Analyze a legal document with AI

```php
$client->ai()->analyzeDocument(mixed $body, array $query = [], array $headers = [], array $options = []);
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
            "description": "PDF or image file to analyze (max 10 MB)"
          }
        },
        "required": [
          "file"
        ]
      }
    }
  }
}
```
