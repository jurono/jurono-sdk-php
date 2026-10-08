# Users

Access with `$client->users()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/users` | `UsersController_list` |
| `search()` | `GET /api/users/search` | `UsersController_search` |
| `export()` | `GET /api/users/export` | `UsersController_export` |
| `getMyProfile()` | `GET /api/users/me/profile` | `UsersController_getMyProfile` |
| `updateMyProfile()` | `PUT /api/users/me/profile` | `UsersController_updateMyProfile` |
| `getMySecurityEvents()` | `GET /api/users/me/security-events` | `UsersController_getMySecurityEvents` |
| `getById()` | `GET /api/users/{id}` | `UsersController_getById` |
| `adminUpdate()` | `PUT /api/users/{id}` | `UsersController_adminUpdate` |
| `delete()` | `DELETE /api/users/{id}` | `UsersController_delete` |
| `getProfile()` | `GET /api/users/{id}/profile` | `UsersController_getProfile` |
| `updateProfile()` | `PUT /api/users/{id}/profile` | `UsersController_updateProfile` |
| `listComments()` | `GET /api/users/{id}/comments` | `UsersController_listComments` |
| `addComment()` | `POST /api/users/{id}/comments` | `UsersController_addComment` |
| `updateMe()` | `PUT /api/users/me` | `UsersController_updateMe` |
| `deleteMe()` | `DELETE /api/users/me` | `UsersController_deleteMe` |
| `import()` | `POST /api/users/import` | `UsersController_import` |

## `list()`

List users (admin)

```php
$client->users()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `search()`

Search users (admin)

```php
$client->users()->search(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (required): {"type": "string"}
- `query.limit` (optional): {"example": 20, "type": "number"}
- `query.offset` (optional): {"example": 0, "type": "number"}

## `export()`

Export users (admin)

```php
$client->users()->export(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.format` (optional): {"enum": ["json", "csv"], "type": "string"}

## `getMyProfile()`

Get my profile

```php
$client->users()->getMyProfile(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateMyProfile()`

Update my profile

```php
$client->users()->updateMyProfile(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateProfileDto"
      }
    }
  }
}
```


## `getMySecurityEvents()`

Get recent account security events for current user

```php
$client->users()->getMySecurityEvents(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getById()`

Get user by id (admin)

```php
$client->users()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `adminUpdate()`

Update user (admin)

```php
$client->users()->adminUpdate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `delete()`

Delete user (admin)

```php
$client->users()->delete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getProfile()`

Get user profile (admin)

```php
$client->users()->getProfile(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `updateProfile()`

Update user profile (admin)

```php
$client->users()->updateProfile(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateProfileDto"
      }
    }
  }
}
```


## `listComments()`

List comments for user (admin)

```php
$client->users()->listComments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `addComment()`

Add comment for user (admin)

```php
$client->users()->addComment(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AddCommentDto"
      }
    }
  }
}
```


## `updateMe()`

Update own profile

```php
$client->users()->updateMe(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `deleteMe()`

Delete own account

```php
$client->users()->deleteMe(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `import()`

Import users (admin)

```php
$client->users()->import(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "properties": {
          "users": {
            "type": "array",
            "items": {
              "type": "object"
            }
          }
        },
        "required": [
          "users"
        ]
      }
    }
  }
}
```
