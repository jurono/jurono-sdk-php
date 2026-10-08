# Affiliates

Access with `$client->affiliates()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `resolve()` | `GET /api/affiliates/resolve/{code}` | `AffiliatePublicController_resolve` |

## `resolve()`

Resolve a public affiliate short link

```php
$client->affiliates()->resolve(string $code, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.code` (required): {"type": "string"}
- `query.assetSlug` (optional): {"type": "string"}
