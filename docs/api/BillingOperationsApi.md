# Billing Operations

Access with `$client->billingOperations()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getStripeReconciliation()` | `GET /api/billing/operations/stripe-reconciliation` | `BillingOperationsController_getStripeReconciliation` |
| `grantBillingOverride()` | `POST /api/billing/operations/billing-overrides` | `BillingOperationsController_grantBillingOverride` |
| `revokeBillingOverride()` | `POST /api/billing/operations/billing-overrides/{organizationId}/revoke` | `BillingOperationsController_revokeBillingOverride` |

## `getStripeReconciliation()`

Get sanitized Stripe webhook reconciliation state

```php
$client->billingOperations()->getStripeReconciliation(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `grantBillingOverride()`

Grant a time-limited audited billing entitlement override

```php
$client->billingOperations()->grantBillingOverride(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/GrantBillingOverrideDto"
      }
    }
  }
}
```


## `revokeBillingOverride()`

Revoke an audited billing entitlement override

```php
$client->billingOperations()->revokeBillingOverride(string $organizationId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RevokeBillingOverrideDto"
      }
    }
  }
}
```
