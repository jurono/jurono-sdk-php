# Lawyers

Access with `$client->lawyers()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getAvailability()` | `GET /api/lawyers/{lawyerId}/availability` | `LawyersBookingController_getAvailability` |

## `getAvailability()`

Get lawyer availability

```php
$client->lawyers()->getAvailability(string $lawyerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"example": "123e4567-e89b-12d3-a456-426614174000", "type": "string"}
- `query.startDate` (optional): {"example": "2026-02-08", "type": "string"}
- `query.endDate` (optional): {"example": "2026-02-15", "type": "string"}
- `query.bookingTypeId` (required): {"example": "123e4567-e89b-12d3-a456-426614174001", "type": "string"}
