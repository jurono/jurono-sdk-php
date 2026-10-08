# Billing

Access with `$client->billing()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `health()` | `GET /api/billing/health` | `BillingController_health` |
| `getMetrics()` | `GET /api/billing/metrics` | `BillingController_getMetrics` |
| `createCheckout()` | `POST /api/billing/checkout` | `BillingController_createCheckout` |
| `createAppointmentCheckout()` | `POST /api/billing/checkout/appointment` | `BillingController_createAppointmentCheckout` |
| `getSessionStatus()` | `GET /api/billing/session/{sessionId}` | `BillingController_getSessionStatus` |
| `webhook()` | `POST /api/billing/stripe/webhook` | `StripeController_webhook` |
| `createPortalSession()` | `POST /api/billing/stripe/portal` | `StripeController_createPortalSession` |
| `create()` | `POST /api/billing/subscriptions` | `SubscriptionsController_create` |
| `cancel()` | `POST /api/billing/subscriptions/{id}/cancel` | `SubscriptionsController_cancel` |
| `get()` | `GET /api/billing/subscriptions/{id}` | `SubscriptionsController_get` |

## `health()`

Check billing service health

```php
$client->billing()->health(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getMetrics()`

Get financial metrics (admin only)

```php
$client->billing()->getMetrics(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.timeframe` (optional): {"enum": ["7d", "30d", "90d", "1y"], "type": "string"}

## `createCheckout()`

Create Stripe checkout session for subscription

```php
$client->billing()->createCheckout(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateCheckoutDto"
      }
    }
  }
}
```


## `createAppointmentCheckout()`

Create Stripe checkout session for appointment payment

```php
$client->billing()->createAppointmentCheckout(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateAppointmentCheckoutDto"
      }
    }
  }
}
```


## `getSessionStatus()`

Get Stripe checkout session status

```php
$client->billing()->getSessionStatus(string $sessionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.sessionId` (required): {"type": "string"}

## `webhook()`

Handle Stripe webhook events

```php
$client->billing()->webhook(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `header.stripe-signature` (required): {"type": "string"}

## `createPortalSession()`

Create Stripe Billing Portal session

```php
$client->billing()->createPortalSession(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreatePortalSessionDto"
      }
    }
  }
}
```


## `create()`

Create subscription via Stripe

```php
$client->billing()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `header.idempotency-key` (optional): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateSubscriptionDto"
      }
    }
  }
}
```


## `cancel()`

Cancel subscription via Stripe

```php
$client->billing()->cancel(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `header.idempotency-key` (optional): {"type": "string"}

## `get()`

Get subscription by ID

```php
$client->billing()->get(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
