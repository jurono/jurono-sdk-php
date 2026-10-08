# marketplace-admin

Access with `$client->marketplaceAdmin()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getQueues()` | `GET /api/marketplace/admin/queues` | `MarketplaceAdminController_getQueues` |
| `listAuditEvents()` | `GET /api/marketplace/admin/audit-events` | `MarketplaceAdminController_listAuditEvents` |
| `resolveDispute()` | `POST /api/marketplace/admin/disputes/{disputeId}/resolve` | `MarketplaceAdminController_resolveDispute` |
| `recordTermsAcceptance()` | `POST /api/marketplace/admin/terms-acceptances` | `MarketplaceAdminController_recordTermsAcceptance` |
| `listTermsAcceptances()` | `GET /api/marketplace/admin/terms-acceptances` | `MarketplaceAdminController_listTermsAcceptances` |
| `getLaunchSetting()` | `GET /api/marketplace/admin/launch-settings` | `MarketplaceAdminController_getLaunchSetting` |
| `updateLaunchSetting()` | `PATCH /api/marketplace/admin/launch-settings` | `MarketplaceAdminController_updateLaunchSetting` |
| `getLaunchChecklist()` | `GET /api/marketplace/admin/launch-checklist` | `MarketplaceAdminController_getLaunchChecklist` |
| `recordAdminAction()` | `POST /api/marketplace/admin/actions` | `MarketplaceAdminController_recordAdminAction` |
| `suspendExpert()` | `POST /api/marketplace/admin/expert-accounts/{expertAccountId}/suspend` | `MarketplaceAdminController_suspendExpert` |
| `reinstateExpert()` | `POST /api/marketplace/admin/expert-accounts/{expertAccountId}/reinstate` | `MarketplaceAdminController_reinstateExpert` |
| `approveBookingException()` | `POST /api/marketplace/admin/bookings/{bookingId}/exception` | `MarketplaceAdminController_approveBookingException` |
| `getAnalyticsFunnel()` | `GET /api/marketplace/admin/analytics/funnel` | `MarketplaceAdminController_getAnalyticsFunnel` |
| `getAnalyticsFinancial()` | `GET /api/marketplace/admin/analytics/financial` | `MarketplaceAdminController_getAnalyticsFinancial` |
| `getAlerts()` | `GET /api/marketplace/admin/alerts` | `MarketplaceAdminController_getAlerts` |

## `getQueues()`

MarketplaceAdminController_getQueues

```php
$client->marketplaceAdmin()->getQueues(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listAuditEvents()`

MarketplaceAdminController_listAuditEvents

```php
$client->marketplaceAdmin()->listAuditEvents(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.eventType` (required): {"type": "string"}
- `query.expertAccountId` (required): {"type": "string"}
- `query.bookingId` (required): {"type": "string"}
- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `resolveDispute()`

MarketplaceAdminController_resolveDispute

```php
$client->marketplaceAdmin()->resolveDispute(string $disputeId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.disputeId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ResolveDisputeDto"
      }
    }
  }
}
```


## `recordTermsAcceptance()`

MarketplaceAdminController_recordTermsAcceptance

```php
$client->marketplaceAdmin()->recordTermsAcceptance(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RecordTermsAcceptanceDto"
      }
    }
  }
}
```


## `listTermsAcceptances()`

MarketplaceAdminController_listTermsAcceptances

```php
$client->marketplaceAdmin()->listTermsAcceptances(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.termsType` (required): {"type": "string"}
- `query.version` (required): {"type": "string"}
- `query.organizationId` (required): {"type": "string"}
- `query.expertAccountId` (required): {"type": "string"}
- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `getLaunchSetting()`

MarketplaceAdminController_getLaunchSetting

```php
$client->marketplaceAdmin()->getLaunchSetting(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateLaunchSetting()`

MarketplaceAdminController_updateLaunchSetting

```php
$client->marketplaceAdmin()->updateLaunchSetting(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateLaunchSettingDto"
      }
    }
  }
}
```


## `getLaunchChecklist()`

MarketplaceAdminController_getLaunchChecklist

```php
$client->marketplaceAdmin()->getLaunchChecklist(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `recordAdminAction()`

MarketplaceAdminController_recordAdminAction

```php
$client->marketplaceAdmin()->recordAdminAction(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RecordAdminActionDto"
      }
    }
  }
}
```


## `suspendExpert()`

MarketplaceAdminController_suspendExpert

```php
$client->marketplaceAdmin()->suspendExpert(string $expertAccountId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}

## `reinstateExpert()`

MarketplaceAdminController_reinstateExpert

```php
$client->marketplaceAdmin()->reinstateExpert(string $expertAccountId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.expertAccountId` (required): {"type": "string"}

## `approveBookingException()`

MarketplaceAdminController_approveBookingException

```php
$client->marketplaceAdmin()->approveBookingException(string $bookingId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.bookingId` (required): {"type": "string"}

## `getAnalyticsFunnel()`

MarketplaceAdminController_getAnalyticsFunnel

```php
$client->marketplaceAdmin()->getAnalyticsFunnel(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getAnalyticsFinancial()`

MarketplaceAdminController_getAnalyticsFinancial

```php
$client->marketplaceAdmin()->getAnalyticsFinancial(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getAlerts()`

MarketplaceAdminController_getAlerts

```php
$client->marketplaceAdmin()->getAlerts(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

