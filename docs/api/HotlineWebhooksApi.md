# Hotline - Webhooks

Access with `$client->hotlineWebhooks()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `handleStripeWebhook()` | `POST /api/hotline/webhook/stripe` | `HotlineWebhookController_handleStripeWebhook` |

## `handleStripeWebhook()`

Stripe webhook handler for hotline payments

```php
$client->hotlineWebhooks()->handleStripeWebhook(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `header.stripe-signature` (required): {"type": "string"}
