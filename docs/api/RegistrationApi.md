# Registration

Access with `$client->registration()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `registerTrial()` | `POST /api/register/trial` | `RegisterController_registerTrial` |
| `registerClient()` | `POST /api/register/client/account` | `RegisterController_registerClient` |
| `registerLawyer()` | `POST /api/register/lawyer/account` | `RegisterController_registerLawyer` |
| `findClaimCandidates()` | `GET /api/register/lawyer/claim/candidates` | `RegisterController_findClaimCandidates` |
| `listMyClaimStatus()` | `GET /api/register/lawyer/claim/status` | `RegisterController_listMyClaimStatus` |
| `resubmitMyClaim()` | `POST /api/register/lawyer/claim/{claimId}/resubmit` | `RegisterController_resubmitMyClaim` |
| `presignClaimDocuments()` | `POST /api/register/lawyer/claim/presign` | `RegisterController_presignClaimDocuments` |
| `claimFirm()` | `POST /api/register/lawyer/claim` | `RegisterController_claimFirm` |

## `registerTrial()`

Register a new trial account (simplified flow)

```php
$client->registration()->registerTrial(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RegisterTrialDto"
      }
    }
  }
}
```


## `registerClient()`

Register a new client account

```php
$client->registration()->registerClient(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RegisterClientDto"
      }
    }
  }
}
```


## `registerLawyer()`

Register a new lawyer account (step 1)

```php
$client->registration()->registerLawyer(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RegisterLawyerDto"
      }
    }
  }
}
```


## `findClaimCandidates()`

Search existing firm/profile candidates before starting a claim

```php
$client->registration()->findClaimCandidates(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.query` (required): {"type": "string"}
- `query.email` (required): {"type": "string"}

## `listMyClaimStatus()`

List my Jurolib profile claim review status

```php
$client->registration()->listMyClaimStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `resubmitMyClaim()`

Resubmit my Jurolib profile claim after rejection or requested changes

```php
$client->registration()->resubmitMyClaim(string $claimId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.claimId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ResubmitProfileClaimDto"
      }
    }
  }
}
```


## `presignClaimDocuments()`

Request presigned URLs for claim document upload (step 2a)

```php
$client->registration()->presignClaimDocuments(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PresignClaimDocumentsDto"
      }
    }
  }
}
```


## `claimFirm()`

Submit firm claim request with uploaded documents (step 2b)

```php
$client->registration()->claimFirm(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LawyerFirmClaimRequestDto"
      }
    }
  }
}
```

