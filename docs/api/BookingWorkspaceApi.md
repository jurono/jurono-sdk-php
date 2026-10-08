# booking-workspace

Access with `$client->bookingWorkspace()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getWorkspaceSummary()` | `GET /api/marketplace/bookings/{bookingId}/workspace` | `BookingWorkspaceController_getWorkspaceSummary` |
| `createMessage()` | `POST /api/marketplace/bookings/{bookingId}/workspace/messages` | `BookingWorkspaceController_createMessage` |
| `listMessages()` | `GET /api/marketplace/bookings/{bookingId}/workspace/messages` | `BookingWorkspaceController_listMessages` |
| `createTask()` | `POST /api/marketplace/bookings/{bookingId}/workspace/tasks` | `BookingWorkspaceController_createTask` |
| `listTasks()` | `GET /api/marketplace/bookings/{bookingId}/workspace/tasks` | `BookingWorkspaceController_listTasks` |
| `updateTask()` | `PATCH /api/marketplace/bookings/{bookingId}/workspace/tasks/{taskId}` | `BookingWorkspaceController_updateTask` |
| `createAttachment()` | `POST /api/marketplace/bookings/{bookingId}/workspace/attachments` | `BookingWorkspaceController_createAttachment` |
| `listAttachments()` | `GET /api/marketplace/bookings/{bookingId}/workspace/attachments` | `BookingWorkspaceController_listAttachments` |
| `approveAttachment()` | `POST /api/marketplace/bookings/{bookingId}/workspace/attachments/{attachmentId}/approve` | `BookingWorkspaceController_approveAttachment` |
| `linkResource()` | `POST /api/marketplace/bookings/{bookingId}/workspace/resource-links` | `BookingWorkspaceController_linkResource` |
| `listResourceLinks()` | `GET /api/marketplace/bookings/{bookingId}/workspace/resource-links` | `BookingWorkspaceController_listResourceLinks` |
| `unlinkResource()` | `DELETE /api/marketplace/bookings/{bookingId}/workspace/resource-links/{linkId}` | `BookingWorkspaceController_unlinkResource` |
| `createAccessGrant()` | `POST /api/marketplace/bookings/{bookingId}/workspace/access-grants` | `BookingWorkspaceController_createAccessGrant` |
| `revokeAccessGrant()` | `DELETE /api/marketplace/bookings/{bookingId}/workspace/access-grants/{grantId}` | `BookingWorkspaceController_revokeAccessGrant` |
| `getActivityTrail()` | `GET /api/marketplace/bookings/{bookingId}/workspace/activity-trail` | `BookingWorkspaceController_getActivityTrail` |

## `getWorkspaceSummary()`

BookingWorkspaceController_getWorkspaceSummary

```php
$client->bookingWorkspace()->getWorkspaceSummary(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `createMessage()`

BookingWorkspaceController_createMessage

```php
$client->bookingWorkspace()->createMessage(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateWorkspaceMessageDto"
      }
    }
  }
}
```


## `listMessages()`

BookingWorkspaceController_listMessages

```php
$client->bookingWorkspace()->listMessages(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `createTask()`

BookingWorkspaceController_createTask

```php
$client->bookingWorkspace()->createTask(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateWorkspaceTaskDto"
      }
    }
  }
}
```


## `listTasks()`

BookingWorkspaceController_listTasks

```php
$client->bookingWorkspace()->listTasks(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `updateTask()`

BookingWorkspaceController_updateTask

```php
$client->bookingWorkspace()->updateTask(string $bookingId, string $taskId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.taskId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateWorkspaceTaskDto"
      }
    }
  }
}
```


## `createAttachment()`

BookingWorkspaceController_createAttachment

```php
$client->bookingWorkspace()->createAttachment(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateWorkspaceAttachmentDto"
      }
    }
  }
}
```


## `listAttachments()`

BookingWorkspaceController_listAttachments

```php
$client->bookingWorkspace()->listAttachments(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `approveAttachment()`

BookingWorkspaceController_approveAttachment

```php
$client->bookingWorkspace()->approveAttachment(string $attachmentId, string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.attachmentId` (required): {"type": "string"}
- `path.bookingId` (required): {"type": "string"}

## `linkResource()`

BookingWorkspaceController_linkResource

```php
$client->bookingWorkspace()->linkResource(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateWorkspaceResourceLinkDto"
      }
    }
  }
}
```


## `listResourceLinks()`

BookingWorkspaceController_listResourceLinks

```php
$client->bookingWorkspace()->listResourceLinks(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `unlinkResource()`

BookingWorkspaceController_unlinkResource

```php
$client->bookingWorkspace()->unlinkResource(string $linkId, string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.linkId` (required): {"type": "string"}
- `path.bookingId` (required): {"type": "string"}

## `createAccessGrant()`

BookingWorkspaceController_createAccessGrant

```php
$client->bookingWorkspace()->createAccessGrant(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateBookingAccessGrantDto"
      }
    }
  }
}
```


## `revokeAccessGrant()`

BookingWorkspaceController_revokeAccessGrant

```php
$client->bookingWorkspace()->revokeAccessGrant(string $bookingId, string $grantId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
- `path.grantId` (required): {"type": "string"}

## `getActivityTrail()`

BookingWorkspaceController_getActivityTrail

```php
$client->bookingWorkspace()->getActivityTrail(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
