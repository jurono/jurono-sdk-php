# Lawyer Earnings

Access with `$client->lawyerEarnings()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getEarningsSummary()` | `GET /api/lawyers/me/earnings/summary` | `LawyerEarningsController_getEarningsSummary` |
| `getTransferHistory()` | `GET /api/lawyers/me/earnings/transfers` | `LawyerEarningsController_getTransferHistory` |
| `getPayouts()` | `GET /api/lawyers/me/earnings/payouts` | `LawyerEarningsController_getPayouts` |
| `getConnectStatus()` | `GET /api/lawyers/me/earnings/connect-status` | `LawyerEarningsController_getConnectStatus` |

## `getEarningsSummary()`

Get my earnings summary (total, pending, available)

```php
$client->lawyerEarnings()->getEarningsSummary(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getTransferHistory()`

Get my transfer history with pagination

```php
$client->lawyerEarnings()->getTransferHistory(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}

## `getPayouts()`

Get my Stripe payouts

```php
$client->lawyerEarnings()->getPayouts(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}

## `getConnectStatus()`

Get my Stripe Connect account status

```php
$client->lawyerEarnings()->getConnectStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
