# Landing Demo

Access with `$client->landingDemo()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listSlots()` | `GET /api/landing-demo/slots` | `LandingDemoController_listSlots` |
| `createBooking()` | `POST /api/landing-demo/bookings` | `LandingDemoController_createBooking` |

## `listSlots()`

List public landing demo slots

```php
$client->landingDemo()->listSlots(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createBooking()`

Create a public landing demo booking

```php
$client->landingDemo()->createBooking(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateDemoBookingDto"
      }
    }
  }
}
```

