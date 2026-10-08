# Consent

Access with `$client->consent()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `logConsent()` | `POST /api/consent/log` | `ConsentController_logConsent` |
| `getConsentStatus()` | `GET /api/consent/status/{userId}` | `ConsentController_getConsentStatus` |
| `getClientIp()` | `GET /api/consent/client-ip` | `ConsentController_getClientIp` |

## `logConsent()`

Log user consent action

```php
$client->consent()->logConsent(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getConsentStatus()`

Get user consent status

```php
$client->consent()->getConsentStatus(string $userId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}

## `getClientIp()`

Get client IP for consent logging

```php
$client->consent()->getClientIp(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

