# Public Forms

Access with `$client->publicForms()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `definition()` | `GET /api/form-builder/public/{token}` | `FormBuilderPublicController_definition` |
| `embed()` | `GET /api/form-builder/public/{token}/embed` | `FormBuilderPublicController_embed` |
| `submit()` | `POST /api/form-builder/public/{token}/submissions` | `FormBuilderPublicController_submit` |

## `definition()`

Read the currently published premium form without private workflow configuration

```php
$client->publicForms()->definition(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `embed()`

Render a standalone iframe form with approved frame ancestors

```php
$client->publicForms()->embed(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `submit()`

Submit published form answers and execute its workflow once

```php
$client->publicForms()->submit(string $token, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BuilderSubmitDto"
      }
    }
  }
}
```
