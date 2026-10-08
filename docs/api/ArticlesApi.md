# Articles

Access with `$client->articles()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/articles` | `ArticlesController_list` |
| `create()` | `POST /api/articles` | `ArticlesController_create` |
| `get()` | `GET /api/articles/{id}` | `ArticlesController_get` |
| `update()` | `PUT /api/articles/{id}` | `ArticlesController_update` |
| `autosave()` | `PATCH /api/articles/{id}/autosave` | `ArticlesController_autosave` |
| `submit()` | `POST /api/articles/{id}/submit` | `ArticlesController_submit` |
| `approve()` | `POST /api/articles/{id}/approve` | `ArticlesController_approve` |
| `requestChanges()` | `POST /api/articles/{id}/request-changes` | `ArticlesController_requestChanges` |
| `reject()` | `POST /api/articles/{id}/reject` | `ArticlesController_reject` |
| `publish()` | `POST /api/articles/{id}/publish` | `ArticlesController_publish` |
| `archive()` | `POST /api/articles/{id}/archive` | `ArticlesController_archive` |

## `list()`

List tenant articles visible to the current contributor or editor

```php
$client->articles()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (optional): {"type": "string", "enum": ["DRAFT", "IN_REVIEW", "APPROVED", "SCHEDULED", "PUBLISHED", "REJECTED", "CHANGES_REQUESTED", "ARCHIVED"]}
- `query.locale` (optional): {"example": "de", "type": "string"}

## `create()`

Create a draft article

```php
$client->articles()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateArticleDto"
      }
    }
  }
}
```


## `get()`

Get an editable tenant article

```php
$client->articles()->get(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update an article with optimistic concurrency

```php
$client->articles()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateArticleDto"
      }
    }
  }
}
```


## `autosave()`

Autosave an article draft with optimistic concurrency

```php
$client->articles()->autosave(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateArticleDto"
      }
    }
  }
}
```


## `submit()`

Submit an article for editorial review

```php
$client->articles()->submit(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `approve()`

Approve or schedule an article

```php
$client->articles()->approve(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ArticleActionDto"
      }
    }
  }
}
```


## `requestChanges()`

Request contributor changes for an article

```php
$client->articles()->requestChanges(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ArticleActionDto"
      }
    }
  }
}
```


## `reject()`

Reject an article submission

```php
$client->articles()->reject(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ArticleActionDto"
      }
    }
  }
}
```


## `publish()`

Publish an approved article

```php
$client->articles()->publish(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `archive()`

Archive an article without deleting its draft history

```php
$client->articles()->archive(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
