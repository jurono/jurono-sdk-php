# Booking

Access with `$client->booking()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listAppointments()` | `GET /api/booking/appointments` | `BookingController_listAppointments` |
| `book()` | `POST /api/booking/appointments` | `BookingController_book` |
| `availability()` | `GET /api/booking/availability` | `BookingController_availability` |
| `propose()` | `POST /api/booking/appointments/proposals` | `BookingController_propose` |
| `accept()` | `POST /api/booking/appointments/{id}/accept` | `BookingController_accept` |
| `decline()` | `POST /api/booking/appointments/{id}/decline` | `BookingController_decline` |
| `cancel()` | `POST /api/booking/appointments/{id}/cancel` | `BookingController_cancel` |
| `reschedule()` | `POST /api/booking/appointments/{id}/reschedule` | `BookingController_reschedule` |
| `requestChange()` | `POST /api/booking/appointments/{id}/request-change` | `BookingController_requestChange` |
| `getRescheduleOptions()` | `GET /api/booking/appointments/{id}/reschedule-options` | `BookingController_getRescheduleOptions` |
| `listPublic()` | `GET /api/booking/types` | `BookingTypesController_listPublic` |
| `create()` | `POST /api/booking/types` | `BookingTypesController_create` |
| `listMine()` | `GET /api/booking/types/me` | `BookingTypesController_listMine` |
| `update()` | `PUT /api/booking/types/{typeId}` | `BookingTypesController_update` |
| `remove()` | `DELETE /api/booking/types/{typeId}` | `BookingTypesController_remove` |
| `getMySchedule()` | `GET /api/booking/schedule/me` | `BookingTypesController_getMySchedule` |
| `updateMySchedule()` | `PUT /api/booking/schedule/me` | `BookingTypesController_updateMySchedule` |
| `getSchedule()` | `GET /api/booking/schedule/{lawyerId}` | `BookingTypesController_getSchedule` |
| `updateSchedule()` | `PUT /api/booking/schedule/{lawyerId}` | `BookingTypesController_updateSchedule` |
| `listMyExceptions()` | `GET /api/booking/schedule/me/exceptions` | `BookingTypesController_listMyExceptions` |
| `createMyException()` | `POST /api/booking/schedule/me/exceptions` | `BookingTypesController_createMyException` |
| `listExceptions()` | `GET /api/booking/schedule/{lawyerId}/exceptions` | `BookingTypesController_listExceptions` |
| `createException()` | `POST /api/booking/schedule/{lawyerId}/exceptions` | `BookingTypesController_createException` |
| `deleteMyException()` | `DELETE /api/booking/schedule/me/exceptions/{exceptionId}` | `BookingTypesController_deleteMyException` |
| `deleteException()` | `DELETE /api/booking/schedule/{lawyerId}/exceptions/{exceptionId}` | `BookingTypesController_deleteException` |
| `getTypeSchedule()` | `GET /api/booking/types/{typeId}/schedule` | `BookingTypesController_getTypeSchedule` |
| `updateTypeSchedule()` | `PUT /api/booking/types/{typeId}/schedule` | `BookingTypesController_updateTypeSchedule` |
| `listTypeExceptions()` | `GET /api/booking/types/{typeId}/exceptions` | `BookingTypesController_listTypeExceptions` |
| `createTypeException()` | `POST /api/booking/types/{typeId}/exceptions` | `BookingTypesController_createTypeException` |
| `deleteTypeException()` | `DELETE /api/booking/types/{typeId}/exceptions/{exceptionId}` | `BookingTypesController_deleteTypeException` |

## `listAppointments()`

List appointments for current user

```php
$client->booking()->listAppointments(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}
- `query.status` (optional): {"type": "string", "enum": ["PENDING", "CONFIRMED", "RESCHEDULED", "IN_PROGRESS", "COMPLETED", "NO_SHOW_CLIENT", "NO_SHOW_LAWYER", "CANCELLED_CLIENT", "CANCELLED_LAWYER", "CANCELLED_SYSTEM"]}
- `query.from` (optional): {"example": "2026-01-25T00:00:00Z", "type": "string"}
- `query.to` (optional): {"example": "2026-01-31T23:59:59Z", "type": "string"}

## `book()`

Create appointment booking

```php
$client->booking()->book(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateAppointmentDto"
      }
    }
  }
}
```


## `availability()`

Get available time slots

```php
$client->booking()->availability(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.lawyerId` (required): {"type": "string"}
- `query.typeId` (required): {"type": "string"}
- `query.from` (optional): {"example": "2026-10-08T03:37:19.296Z", "type": "string"}
- `query.to` (optional): {"example": "2026-10-15T03:37:19.296Z", "type": "string"}
- `query.duration` (optional): {"example": 60, "type": "number"}

## `propose()`

Propose an appointment to a client

```php
$client->booking()->propose(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ProposeAppointmentDto"
      }
    }
  }
}
```


## `accept()`

Accept an appointment proposal

```php
$client->booking()->accept(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `decline()`

Decline an appointment proposal

```php
$client->booking()->decline(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CancelAppointmentDto"
      }
    }
  }
}
```


## `cancel()`

Cancel an appointment

```php
$client->booking()->cancel(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CancelAppointmentDto"
      }
    }
  }
}
```


## `reschedule()`

Reschedule an appointment

```php
$client->booking()->reschedule(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RescheduleAppointmentDto"
      }
    }
  }
}
```


## `requestChange()`

Request an appointment change

```php
$client->booking()->requestChange(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RequestAppointmentChangeDto"
      }
    }
  }
}
```


## `getRescheduleOptions()`

Get suggested reschedule slots for an appointment

```php
$client->booking()->getRescheduleOptions(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.days` (optional): {"type": "number"}

## `listPublic()`

List public booking types for a lawyer

```php
$client->booking()->listPublic(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.lawyerId` (required): {"type": "string"}

## `create()`

Create booking type (lawyer or admin/org)

```php
$client->booking()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateBookingTypeDto"
      }
    }
  }
}
```


## `listMine()`

List my booking types

```php
$client->booking()->listMine(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `update()`

Update booking type (lawyer or admin/org)

```php
$client->booking()->update(string $typeId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateBookingTypeDto"
      }
    }
  }
}
```


## `remove()`

Delete booking type (lawyer or admin/org)

```php
$client->booking()->remove(string $typeId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

## `getMySchedule()`

Get my default booking schedule

```php
$client->booking()->getMySchedule(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateMySchedule()`

Update my default booking schedule

```php
$client->booking()->updateMySchedule(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateScheduleDto"
      }
    }
  }
}
```


## `getSchedule()`

Get default booking schedule for a lawyer (admin/org)

```php
$client->booking()->getSchedule(string $lawyerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}

## `updateSchedule()`

Update default booking schedule for a lawyer (admin/org)

```php
$client->booking()->updateSchedule(string $lawyerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateScheduleDto"
      }
    }
  }
}
```


## `listMyExceptions()`

List my default schedule exceptions

```php
$client->booking()->listMyExceptions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createMyException()`

Create default schedule exception for me

```php
$client->booking()->createMyException(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateScheduleExceptionDto"
      }
    }
  }
}
```


## `listExceptions()`

List default schedule exceptions (admin/org)

```php
$client->booking()->listExceptions(string $lawyerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}

## `createException()`

Create default schedule exception (admin/org)

```php
$client->booking()->createException(string $lawyerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateScheduleExceptionDto"
      }
    }
  }
}
```


## `deleteMyException()`

Delete my default schedule exception

```php
$client->booking()->deleteMyException(string $exceptionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.exceptionId` (required): {"type": "string"}

## `deleteException()`

Delete default schedule exception (admin/org)

```php
$client->booking()->deleteException(string $lawyerId, string $exceptionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}
- `path.exceptionId` (required): {"type": "string"}

## `getTypeSchedule()`

Get booking type schedule (admin/org or owner)

```php
$client->booking()->getTypeSchedule(string $typeId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

## `updateTypeSchedule()`

Update booking type schedule (admin/org or owner)

```php
$client->booking()->updateTypeSchedule(string $typeId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateScheduleDto"
      }
    }
  }
}
```


## `listTypeExceptions()`

List booking type exceptions (admin/org or owner)

```php
$client->booking()->listTypeExceptions(string $typeId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

## `createTypeException()`

Create booking type exception (admin/org or owner)

```php
$client->booking()->createTypeException(string $typeId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateScheduleExceptionDto"
      }
    }
  }
}
```


## `deleteTypeException()`

Delete booking type exception (admin/org or owner)

```php
$client->booking()->deleteTypeException(string $typeId, string $exceptionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.typeId` (required): {"type": "string"}
- `path.exceptionId` (required): {"type": "string"}
