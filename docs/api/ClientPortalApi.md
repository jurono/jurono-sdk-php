# Client Portal

Access with `$client->clientPortal()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `previewRequestClaim()` | `GET /api/clients/me/request-claims/{token}` | `ClientPortalController_previewRequestClaim` |
| `consumeRequestClaim()` | `POST /api/clients/me/request-claims/{token}/consume` | `ClientPortalController_consumeRequestClaim` |
| `getProfile()` | `GET /api/clients/me/profile` | `ClientPortalController_getProfile` |
| `updateProfile()` | `PUT /api/clients/me/profile` | `ClientPortalController_updateProfile` |
| `listRequests()` | `GET /api/clients/me/requests` | `ClientPortalController_listRequests` |
| `getRequest()` | `GET /api/clients/me/requests/{id}` | `ClientPortalController_getRequest` |
| `getRequestTimeline()` | `GET /api/clients/me/requests/{id}/timeline` | `ClientPortalController_getRequestTimeline` |
| `getRequestNextSteps()` | `GET /api/clients/me/requests/{id}/next-steps` | `ClientPortalController_getRequestNextSteps` |
| `respondToRequest()` | `POST /api/clients/me/requests/{id}/responses` | `ClientPortalController_respondToRequest` |
| `withdrawRequest()` | `PATCH /api/clients/me/requests/{id}/withdraw` | `ClientPortalController_withdrawRequest` |
| `previewMandateActivation()` | `GET /api/clients/me/mandate-activations/{token}` | `ClientPortalController_previewMandateActivation` |
| `consumeMandateActivation()` | `POST /api/clients/me/mandate-activations/{token}/consume` | `ClientPortalController_consumeMandateActivation` |
| `revokeMandateAccess()` | `PATCH /api/clients/me/mandates/{id}/access/revoke` | `ClientPortalController_revokeMandateAccess` |
| `listMandates()` | `GET /api/clients/me/mandates` | `ClientPortalController_listMandates` |
| `getMandate()` | `GET /api/clients/me/mandates/{id}` | `ClientPortalController_getMandate` |
| `getMandateActivity()` | `GET /api/clients/me/mandates/{id}/activity` | `ClientPortalController_getMandateActivity` |
| `listMandateTasks()` | `GET /api/clients/me/mandates/{id}/tasks` | `ClientPortalController_listMandateTasks` |

## `previewRequestClaim()`

Preview a guest request claim link without exposing the raw inquiry id

```php
$client->clientPortal()->previewRequestClaim(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `consumeRequestClaim()`

Claim a guest request for the signed-in verified client account

```php
$client->clientPortal()->consumeRequestClaim(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `getProfile()`

Get my client profile

```php
$client->clientPortal()->getProfile(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateProfile()`

Update my client profile

```php
$client->clientPortal()->updateProfile(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listRequests()`

List my pre-mandate requests

```php
$client->clientPortal()->listRequests(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.offset` (optional): {"type": "number"}
- `query.limit` (optional): {"type": "number"}

## `getRequest()`

Get one of my requests

```php
$client->clientPortal()->getRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getRequestTimeline()`

Get timeline for one of my requests

```php
$client->clientPortal()->getRequestTimeline(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getRequestNextSteps()`

Get next steps for one of my requests

```php
$client->clientPortal()->getRequestNextSteps(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `respondToRequest()`

Respond to a client-visible information request

```php
$client->clientPortal()->respondToRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `withdrawRequest()`

Withdraw one of my requests before acceptance

```php
$client->clientPortal()->withdrawRequest(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `previewMandateActivation()`

Preview a converted mandate activation link without exposing unrelated mandate data

```php
$client->clientPortal()->previewMandateActivation(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `consumeMandateActivation()`

Activate exactly one converted mandate for the signed-in verified client account

```php
$client->clientPortal()->consumeMandateActivation(string $token, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.token` (required): {"type": "string"}

## `revokeMandateAccess()`

Revoke my own client access to one mandate

```php
$client->clientPortal()->revokeMandateAccess(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listMandates()`

List my mandates

```php
$client->clientPortal()->listMandates(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getMandate()`

Get one of my mandates with extended details

```php
$client->clientPortal()->getMandate(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `getMandateActivity()`

Get activity for one of my mandates

```php
$client->clientPortal()->getMandateActivity(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listMandateTasks()`

List explicitly client-visible tasks for one of my mandates

```php
$client->clientPortal()->listMandateTasks(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
