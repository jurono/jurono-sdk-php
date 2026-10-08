# Form Builder

Access with `$client->formBuilder()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `members()` | `GET /api/form-builder/members` | `FormBuilderController_members` |
| `list()` | `GET /api/form-builder` | `FormBuilderController_list` |
| `create()` | `POST /api/form-builder` | `FormBuilderController_create` |
| `get()` | `GET /api/form-builder/{id}` | `FormBuilderController_get` |
| `save()` | `PUT /api/form-builder/{id}` | `FormBuilderController_save` |
| `publish()` | `POST /api/form-builder/{id}/publish` | `FormBuilderController_publish` |
| `pause()` | `POST /api/form-builder/{id}/pause` | `FormBuilderController_pause` |
| `archive()` | `POST /api/form-builder/{id}/archive` | `FormBuilderController_archive` |
| `submissions()` | `GET /api/form-builder/{id}/submissions` | `FormBuilderController_submissions` |

## `members()`

List active tenant members eligible for form workflows

```php
$client->formBuilder()->members(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `list()`

List premium custom intake forms for the current tenant

```php
$client->formBuilder()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `create()`

Create a custom form draft

```php
$client->formBuilder()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateBuilderFormDto"
      }
    }
  }
}
```


## `get()`

Get a tenant form draft and publication state

```php
$client->formBuilder()->get(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `save()`

Save a draft using optimistic revision control

```php
$client->formBuilder()->save(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SaveBuilderFormDto"
      }
    }
  }
}
```


## `publish()`

Publish an immutable form and workflow snapshot

```php
$client->formBuilder()->publish(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BuilderRevisionDto"
      }
    }
  }
}
```


## `pause()`

Disable public access to a form

```php
$client->formBuilder()->pause(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BuilderRevisionDto"
      }
    }
  }
}
```


## `archive()`

Archive a form while retaining its submissions

```php
$client->formBuilder()->archive(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BuilderRevisionDto"
      }
    }
  }
}
```


## `submissions()`

List submissions with immutable answer labels and workflow execution results

```php
$client->formBuilder()->submissions(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
