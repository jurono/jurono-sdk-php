# marketplace-payments

Access with `$client->marketplacePayments()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `createPaymentIntent()` | `POST /api/marketplace/payments/intent` | `MarketplacePaymentController_createPaymentIntent` |
| `getPaymentSummary()` | `GET /api/marketplace/payments/{bookingId}/summary` | `MarketplacePaymentController_getPaymentSummary` |
| `refundPayment()` | `POST /api/marketplace/payments/{bookingId}/refund` | `MarketplacePaymentController_refundPayment` |
| `releaseTransfer()` | `POST /api/marketplace/payments/{bookingId}/release-transfer` | `MarketplacePaymentController_releaseTransfer` |

## `createPaymentIntent()`

MarketplacePaymentController_createPaymentIntent

```php
$client->marketplacePayments()->createPaymentIntent(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreatePaymentIntentDto"
      }
    }
  }
}
```


## `getPaymentSummary()`

MarketplacePaymentController_getPaymentSummary

```php
$client->marketplacePayments()->getPaymentSummary(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `refundPayment()`

MarketplacePaymentController_refundPayment

```php
$client->marketplacePayments()->refundPayment(string $bookingId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RefundPaymentDto"
      }
    }
  }
}
```


## `releaseTransfer()`

MarketplacePaymentController_releaseTransfer

```php
$client->marketplacePayments()->releaseTransfer(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}
