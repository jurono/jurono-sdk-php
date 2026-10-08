# Appointments

Access with `$client->appointments()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `bookAppointment()` | `POST /api/appointments/book` | `AppointmentsController_bookAppointment` |
| `getAppointment()` | `GET /api/appointments/{appointmentId}` | `AppointmentsController_getAppointment` |

## `bookAppointment()`

Create a new appointment booking

```php
$client->appointments()->bookAppointment(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/BookAppointmentDto"
      }
    }
  }
}
```


## `getAppointment()`

Get appointment details

```php
$client->appointments()->getAppointment(string $appointmentId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.appointmentId` (required): {"example": "123e4567-e89b-12d3-a456-426614174000", "type": "string"}
- `query.referenceNumber` (required): {"type": "string"}
