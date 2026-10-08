# Forms

Access with `$client->forms()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getSubmissions()` | `GET /api/forms/submissions` | `FormsController_getSubmissions` |
| `getSubmissionDossier()` | `GET /api/forms/submissions/{id}` | `FormsController_getSubmissionDossier` |
| `requestSubmissionInfo()` | `POST /api/forms/submissions/{id}/request-info` | `FormsController_requestSubmissionInfo` |
| `createSubmissionInternalNote()` | `POST /api/forms/submissions/{id}/notes` | `FormsController_createSubmissionInternalNote` |
| `getSubmissionAcceptancePreflight()` | `GET /api/forms/submissions/{id}/acceptance-preflight` | `FormsController_getSubmissionAcceptancePreflight` |
| `archiveSubmission()` | `PATCH /api/forms/submissions/{id}/archive` | `FormsController_archiveSubmission` |
| `acceptSubmission()` | `PATCH /api/forms/submissions/{id}/accept` | `FormsController_acceptSubmission` |
| `qualifySubmission()` | `PATCH /api/forms/submissions/{id}/qualify` | `FormsController_qualifySubmission` |
| `assignSubmission()` | `PATCH /api/forms/submissions/{id}/assign` | `FormsController_assignSubmission` |
| `markSubmissionConverted()` | `PATCH /api/forms/submissions/{id}/conversion` | `FormsController_markSubmissionConverted` |
| `correctSubmissionConversion()` | `PATCH /api/forms/submissions/{id}/conversion-correction` | `FormsController_correctSubmissionConversion` |
| `recordPublicIntakeEvent()` | `POST /api/forms/intake/events` | `FormsController_recordPublicIntakeEvent` |
| `submitIntake()` | `POST /api/forms/intake` | `FormsController_submitIntake` |
| `submitPublicIntake()` | `POST /api/forms/public/{access}/submissions` | `FormsController_submitPublicIntake` |

## `getSubmissions()`

Get form submissions for current lawyer

```php
$client->forms()->getSubmissions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (required): {"type": "string"}
- `query.limit` (required): {"type": "string"}
- `query.from` (required): {"type": "string"}
- `query.to` (required): {"type": "string"}

## `getSubmissionDossier()`

Get a complete inquiry dossier

```php
$client->forms()->getSubmissionDossier(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `requestSubmissionInfo()`

Send a client-visible request for more inquiry information

```php
$client->forms()->requestSubmissionInfo(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RequestInquiryInfoDto"
      }
    }
  }
}
```


## `createSubmissionInternalNote()`

Create an internal note on an inquiry dossier

```php
$client->forms()->createSubmissionInternalNote(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateInquiryInternalNoteDto"
      }
    }
  }
}
```


## `getSubmissionAcceptancePreflight()`

Get server-owned inquiry acceptance prerequisites and client-resolution options

```php
$client->forms()->getSubmissionAcceptancePreflight(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `archiveSubmission()`

Archive a form submission

```php
$client->forms()->archiveSubmission(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ArchiveSubmissionDto"
      }
    }
  }
}
```


## `acceptSubmission()`

Accept a form submission

```php
$client->forms()->acceptSubmission(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AcceptInquiryDto"
      }
    }
  }
}
```


## `qualifySubmission()`

Qualify a form submission

```php
$client->forms()->qualifySubmission(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `assignSubmission()`

Assign a qualified submission to a lawyer

```php
$client->forms()->assignSubmission(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AssignSubmissionDto"
      }
    }
  }
}
```


## `markSubmissionConverted()`

Link a converted intake submission to its client and mandate

```php
$client->forms()->markSubmissionConverted(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `correctSubmissionConversion()`

Correct the client or responsible lawyer on a converted intake submission

```php
$client->forms()->correctSubmissionConversion(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CorrectInquiryConversionDto"
      }
    }
  }
}
```


## `recordPublicIntakeEvent()`

Record a privacy-safe public intake funnel event

```php
$client->forms()->recordPublicIntakeEvent(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PublicIntakeEventDto"
      }
    }
  }
}
```


## `submitIntake()`

Submit intake form for initial consultation

```php
$client->forms()->submitIntake(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SubmitIntakeDto"
      }
    }
  }
}
```


## `submitPublicIntake()`

Submit a public intake form by slug or access token

```php
$client->forms()->submitPublicIntake(string $access, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.access` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SubmitIntakeDto"
      }
    }
  }
}
```

