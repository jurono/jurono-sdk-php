# Firms

Access with `$client->firms()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `searchFirms()` | `GET /api/firms/search` | `FirmsController_searchFirms` |

## `searchFirms()`

Search for law firms

```php
$client->firms()->searchFirms(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (required): {"type": "string"}
