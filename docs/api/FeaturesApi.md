# Features

Access with `$client->features()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getMyFeatures()` | `GET /api/me/features` | `UserFeaturesController_getMyFeatures` |

## `getMyFeatures()`

Get release gates and subscription entitlements for the current user

```php
$client->features()->getMyFeatures(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
