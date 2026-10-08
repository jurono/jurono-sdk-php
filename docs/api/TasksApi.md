# Tasks

Access with `$client->tasks()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/tasks` | `TasksController_list` |
| `create()` | `POST /api/tasks` | `TasksController_create` |
| `getById()` | `GET /api/tasks/{id}` | `TasksController_getById` |
| `update()` | `PUT /api/tasks/{id}` | `TasksController_update` |
| `delete()` | `DELETE /api/tasks/{id}` | `TasksController_delete` |
| `processDueReminders()` | `POST /api/tasks/reminders/process-due` | `TasksController_processDueReminders` |
| `complete()` | `POST /api/tasks/{id}/complete` | `TasksController_complete` |
| `cancel()` | `POST /api/tasks/{id}/cancel` | `TasksController_cancel` |
| `addComment()` | `POST /api/tasks/{id}/comments` | `TasksController_addComment` |
| `getComments()` | `GET /api/tasks/{id}/comments` | `TasksController_getComments` |
| `addAttachment()` | `POST /api/tasks/{id}/attachments` | `TasksController_addAttachment` |
| `getAttachments()` | `GET /api/tasks/{id}/attachments` | `TasksController_getAttachments` |

## `list()`

List tasks for organization

```php
$client->tasks()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `create()`

Create a new task

```php
$client->tasks()->create(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getById()`

Get task by ID

```php
$client->tasks()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update a task

```php
$client->tasks()->update(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `delete()`

Delete a task (soft delete)

```php
$client->tasks()->delete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `processDueReminders()`

Process due task reminders with retry-safe state

```php
$client->tasks()->processDueReminders(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `complete()`

Complete a task with actor, reason and evidence

```php
$client->tasks()->complete(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `cancel()`

Cancel a task with actor and reason

```php
$client->tasks()->cancel(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `addComment()`

Add a comment to a task

```php
$client->tasks()->addComment(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
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
          "content": {
            "type": "string",
            "description": "Comment content"
          }
        },
        "required": [
          "content"
        ]
      }
    }
  }
}
```


## `getComments()`

Get comments for a task

```php
$client->tasks()->getComments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `addAttachment()`

Add an attachment to a task

```php
$client->tasks()->addAttachment(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getAttachments()`

Get attachments for a task

```php
$client->tasks()->getAttachments(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
