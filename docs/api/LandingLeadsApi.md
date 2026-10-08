# Landing Leads

Access with `$client->landingLeads()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `submit()` | `POST /api/landing-leads` | `LandingLeadsController_submit` |

## `submit()`

Capture and deliver public landing lead notifications

```php
$client->landingLeads()->submit(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateLandingLeadDto"
      }
    }
  }
}
```
