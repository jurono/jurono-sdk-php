# Admin - Compliance

Access with `$client->adminCompliance()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listChecks()` | `GET /api/compliance/checks` | `ComplianceController_listChecks` |
| `listReports()` | `GET /api/compliance/reports` | `ComplianceController_listReports` |
| `dryRunTenantTeardown()` | `GET /api/compliance/tenants/{organizationId}/teardown/dry-run` | `ComplianceController_dryRunTenantTeardown` |
| `executeTenantTeardown()` | `POST /api/compliance/tenants/{organizationId}/teardown` | `ComplianceController_executeTenantTeardown` |
| `listRetentionMatrix()` | `GET /api/compliance/retention/matrix` | `ComplianceController_listRetentionMatrix` |
| `listRetentionJobs()` | `GET /api/compliance/retention/jobs` | `ComplianceController_listRetentionJobs` |
| `scheduleRetentionJobs()` | `POST /api/compliance/retention/jobs/schedule` | `ComplianceController_scheduleRetentionJobs` |
| `runRetentionJobs()` | `POST /api/compliance/retention/jobs/run` | `ComplianceController_runRetentionJobs` |
| `runRetentionJob()` | `POST /api/compliance/retention/jobs/{id}/run` | `ComplianceController_runRetentionJob` |
| `releaseRetentionHold()` | `POST /api/compliance/retention/jobs/{id}/release-hold` | `ComplianceController_releaseRetentionHold` |
| `exportAgreementAcceptanceProofBundle()` | `GET /api/compliance/agreement-acceptances/proof-bundle` | `ComplianceController_exportAgreementAcceptanceProofBundle` |
| `runIso()` | `POST /api/compliance/run/iso27001` | `ComplianceController_runIso` |
| `runTs()` | `POST /api/compliance/run/ts` | `ComplianceController_runTs` |
| `exportReport()` | `POST /api/compliance/reports/{id}/export` | `ComplianceController_exportReport` |
| `listDataSubjectRequests()` | `GET /api/compliance/data-subject-requests` | `ComplianceController_listDataSubjectRequests` |
| `createDataSubjectRequest()` | `POST /api/compliance/data-subject-requests` | `ComplianceController_createDataSubjectRequest` |
| `verifyDataSubjectRequest()` | `POST /api/compliance/data-subject-requests/{id}/verify` | `ComplianceController_verifyDataSubjectRequest` |
| `rejectDataSubjectRequest()` | `POST /api/compliance/data-subject-requests/{id}/reject` | `ComplianceController_rejectDataSubjectRequest` |
| `completeDataSubjectExportRequest()` | `POST /api/compliance/data-subject-requests/{id}/export` | `ComplianceController_completeDataSubjectExportRequest` |
| `completeDataSubjectAnonymizationRequest()` | `POST /api/compliance/data-subject-requests/{id}/anonymize` | `ComplianceController_completeDataSubjectAnonymizationRequest` |
| `createDataSubjectExport()` | `POST /api/compliance/data-subjects/{userId}/export` | `ComplianceController_createDataSubjectExport` |
| `discoverDataSubjectRecords()` | `GET /api/compliance/data-subjects/{userId}/discovery` | `ComplianceController_discoverDataSubjectRecords` |
| `anonymizeDataSubject()` | `POST /api/compliance/data-subjects/{userId}/anonymize` | `ComplianceController_anonymizeDataSubject` |
| `listSupportAccessGrants()` | `GET /api/compliance/support-access/grants` | `ComplianceController_listSupportAccessGrants` |
| `createSupportAccessGrant()` | `POST /api/compliance/support-access/grants` | `ComplianceController_createSupportAccessGrant` |
| `revokeSupportAccessGrant()` | `POST /api/compliance/support-access/grants/{id}/revoke` | `ComplianceController_revokeSupportAccessGrant` |
| `checkSupportAccess()` | `POST /api/compliance/support-access/check` | `ComplianceController_checkSupportAccess` |
| `createPrivacyTabletop()` | `POST /api/compliance/privacy-tabletops` | `ComplianceController_createPrivacyTabletop` |
| `completePrivacyTabletop()` | `POST /api/compliance/privacy-tabletops/{id}/complete` | `ComplianceController_completePrivacyTabletop` |

## `listChecks()`

List compliance checks

```php
$client->adminCompliance()->listChecks(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listReports()`

List compliance reports

```php
$client->adminCompliance()->listReports(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `dryRunTenantTeardown()`

Dry-run ordered tenant teardown and report affected rows

```php
$client->adminCompliance()->dryRunTenantTeardown(string $organizationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

## `executeTenantTeardown()`

Execute ordered tenant teardown with retention-safe anonymization

```php
$client->adminCompliance()->executeTenantTeardown(string $organizationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.organizationId` (required): {"type": "string"}

## `listRetentionMatrix()`

List enforceable retention matrix entries

```php
$client->adminCompliance()->listRetentionMatrix(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listRetentionJobs()`

List retention lifecycle jobs and statuses

```php
$client->adminCompliance()->listRetentionJobs(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (required): {"type": "string"}
- `query.entityType` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}

## `scheduleRetentionJobs()`

Schedule due retention lifecycle jobs idempotently

```php
$client->adminCompliance()->scheduleRetentionJobs(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `runRetentionJobs()`

Schedule and execute due retention lifecycle jobs

```php
$client->adminCompliance()->runRetentionJobs(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `runRetentionJob()`

Execute one retention lifecycle job

```php
$client->adminCompliance()->runRetentionJob(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `releaseRetentionHold()`

Release a legal hold and reschedule the retention job

```php
$client->adminCompliance()->releaseRetentionHold(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `exportAgreementAcceptanceProofBundle()`

Export agreement acceptance proof bundle for an organization

```php
$client->adminCompliance()->exportAgreementAcceptanceProofBundle(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.organizationId` (required): {"type": "string"}

## `runIso()`

Run ISO 27001 verification (TS script)

```php
$client->adminCompliance()->runIso(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `runTs()`

Run a TypeScript compliance check under scripts/

```php
$client->adminCompliance()->runTs(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `exportReport()`

Export a compliance report as PDF

```php
$client->adminCompliance()->exportReport(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listDataSubjectRequests()`

List GDPR data subject requests

```php
$client->adminCompliance()->listDataSubjectRequests(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}
- `query.status` (required): {"type": "string"}
- `query.q` (required): {"type": "string"}

## `createDataSubjectRequest()`

Create a GDPR data subject request

```php
$client->adminCompliance()->createDataSubjectRequest(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `verifyDataSubjectRequest()`

Verify a GDPR data subject request identity check

```php
$client->adminCompliance()->verifyDataSubjectRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `rejectDataSubjectRequest()`

Reject a GDPR data subject request

```php
$client->adminCompliance()->rejectDataSubjectRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `completeDataSubjectExportRequest()`

Complete a verified GDPR access or portability request

```php
$client->adminCompliance()->completeDataSubjectExportRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `completeDataSubjectAnonymizationRequest()`

Complete a verified GDPR erasure request

```php
$client->adminCompliance()->completeDataSubjectAnonymizationRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `createDataSubjectExport()`

Create a GDPR data subject access export

```php
$client->adminCompliance()->createDataSubjectExport(string $userId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}

## `discoverDataSubjectRecords()`

Discover linked GDPR data subject records without processing them

```php
$client->adminCompliance()->discoverDataSubjectRecords(string $userId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}
- `query.organizationId` (required): {"type": "string"}

## `anonymizeDataSubject()`

Anonymize and deactivate a GDPR data subject

```php
$client->adminCompliance()->anonymizeDataSubject(string $userId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.userId` (required): {"type": "string"}

## `listSupportAccessGrants()`

List scoped support access grants

```php
$client->adminCompliance()->listSupportAccessGrants(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (required): {"type": "string"}
- `query.supportUserId` (required): {"type": "string"}
- `query.organizationId` (required): {"type": "string"}

## `createSupportAccessGrant()`

Create scoped, expiring support access grant

```php
$client->adminCompliance()->createSupportAccessGrant(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `revokeSupportAccessGrant()`

Revoke a scoped support access grant

```php
$client->adminCompliance()->revokeSupportAccessGrant(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `checkSupportAccess()`

Check and audit support access before a content action

```php
$client->adminCompliance()->checkSupportAccess(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `createPrivacyTabletop()`

Schedule a privacy/security tabletop exercise

```php
$client->adminCompliance()->createPrivacyTabletop(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `completePrivacyTabletop()`

Complete a privacy/security tabletop exercise with findings

```php
$client->adminCompliance()->completePrivacyTabletop(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
