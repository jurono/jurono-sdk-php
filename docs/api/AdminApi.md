# Admin

Access with `$client->admin()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getMetrics()` | `GET /api/admin/metrics` | `AdminAnalyticsController_getMetrics` |
| `getAnalytics()` | `GET /api/admin/analytics` | `AdminAnalyticsController_getAnalytics` |
| `getServerTraffic()` | `GET /api/admin/analytics/server-traffic` | `AdminAnalyticsController_getServerTraffic` |
| `listPartners()` | `GET /api/admin/affiliates` | `AdminAffiliatesController_listPartners` |
| `createPartner()` | `POST /api/admin/affiliates` | `AdminAffiliatesController_createPartner` |
| `updatePartner()` | `PATCH /api/admin/affiliates/{id}` | `AdminAffiliatesController_updatePartner` |
| `listAttributions()` | `GET /api/admin/affiliates/attributions` | `AdminAffiliatesController_listAttributions` |
| `listAssets()` | `GET /api/admin/affiliates/{id}/assets` | `AdminAffiliatesController_listAssets` |
| `createAsset()` | `POST /api/admin/affiliates/{id}/assets` | `AdminAffiliatesController_createAsset` |
| `updateAsset()` | `PATCH /api/admin/affiliates/{id}/assets/{assetId}` | `AdminAffiliatesController_updateAsset` |
| `downloadAssetQr()` | `GET /api/admin/affiliates/{id}/assets/{assetId}/qr.svg` | `AdminAffiliatesController_downloadAssetQr` |
| `listRules()` | `GET /api/admin/affiliates/{id}/rules` | `AdminAffiliatesController_listRules` |
| `createRule()` | `POST /api/admin/affiliates/{id}/rules` | `AdminAffiliatesController_createRule` |
| `updateRule()` | `PATCH /api/admin/affiliates/{id}/rules/{ruleId}` | `AdminAffiliatesController_updateRule` |
| `recordCommission()` | `POST /api/admin/affiliates/{id}/commissions` | `AdminAffiliatesController_recordCommission` |
| `getStatus()` | `GET /api/admin/legal-knowledge/status` | `AdminLegalKnowledgeController_getStatus` |
| `runImport()` | `POST /api/admin/legal-knowledge/import` | `AdminLegalKnowledgeController_runImport` |

## `getMetrics()`

Get admin dashboard metrics from live platform data

```php
$client->admin()->getMetrics(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getAnalytics()`

Get admin dashboard analytics from live platform data

```php
$client->admin()->getAnalytics(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.timeframe` (optional): {"enum": ["7d", "30d", "90d", "1y"], "type": "string"}

## `getServerTraffic()`

Get server-side request traffic summary

```php
$client->admin()->getServerTraffic(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.source` (optional): {"type": "string"}
- `query.timeframe` (optional): {"enum": ["7d", "30d", "90d"], "type": "string"}

## `listPartners()`

List affiliate partners

```php
$client->admin()->listPartners(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "string"}

## `createPartner()`

Create an affiliate partner

```php
$client->admin()->createPartner(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateAffiliatePartnerDto"
      }
    }
  }
}
```


## `updatePartner()`

Update an affiliate partner

```php
$client->admin()->updatePartner(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateAffiliatePartnerDto"
      }
    }
  }
}
```


## `listAttributions()`

List affiliate-attributed signups

```php
$client->admin()->listAttributions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.affiliatePartnerId` (optional): {"type": "string"}
- `query.offset` (optional): {"type": "string"}
- `query.limit` (optional): {"type": "string"}

## `listAssets()`

List affiliate printable and shareable assets

```php
$client->admin()->listAssets(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createAsset()`

Create an affiliate printable or shareable asset

```php
$client->admin()->createAsset(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateAffiliateAssetDto"
      }
    }
  }
}
```


## `updateAsset()`

Update an affiliate printable or shareable asset

```php
$client->admin()->updateAsset(string $id, string $assetId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.assetId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateAffiliateAssetDto"
      }
    }
  }
}
```


## `downloadAssetQr()`

Download affiliate QR code SVG for an asset

```php
$client->admin()->downloadAssetQr(string $id, string $assetId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.assetId` (required): {"type": "string"}

## `listRules()`

List affiliate commission rules

```php
$client->admin()->listRules(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createRule()`

Create an affiliate commission rule

```php
$client->admin()->createRule(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateAffiliateCommissionRuleDto"
      }
    }
  }
}
```


## `updateRule()`

Update an affiliate commission rule

```php
$client->admin()->updateRule(string $id, string $ruleId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.ruleId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateAffiliateCommissionRuleDto"
      }
    }
  }
}
```


## `recordCommission()`

Record an affiliate commission

```php
$client->admin()->recordCommission(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RecordAffiliateCommissionDto"
      }
    }
  }
}
```


## `getStatus()`

Get German legal knowledge corpus import status

```php
$client->admin()->getStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `runImport()`

Run a bounded German legal knowledge corpus import

```php
$client->admin()->runImport(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RunLegalKnowledgeImportDto"
      }
    }
  }
}
```
