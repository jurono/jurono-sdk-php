# Admin - Lawyer Profiles

Access with `$client->adminLawyerProfiles()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listClaims()` | `GET /api/admin/lawyer-profiles/claims` | `LawyerProfilesAdminController_listClaims` |
| `reviewClaim()` | `POST /api/admin/lawyer-profiles/claims/{claimId}/review` | `LawyerProfilesAdminController_reviewClaim` |
| `suspendProfile()` | `POST /api/admin/lawyer-profiles/{profileId}/suspend` | `LawyerProfilesAdminController_suspendProfile` |
| `restoreProfile()` | `POST /api/admin/lawyer-profiles/{profileId}/restore` | `LawyerProfilesAdminController_restoreProfile` |

## `listClaims()`

List pending Jurolib profile claim reviews

```php
$client->adminLawyerProfiles()->listClaims(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `reviewClaim()`

Approve, reject, or request changes for a Jurolib profile claim

```php
$client->adminLawyerProfiles()->reviewClaim(string $claimId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.claimId` (required): {"type": "string"}

## `suspendProfile()`

Suspend public Jurolib profile visibility and inquiry routing

```php
$client->adminLawyerProfiles()->suspendProfile(string $profileId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.profileId` (required): {"type": "string"}

## `restoreProfile()`

Restore a suspended Jurolib profile to accepting inquiries

```php
$client->adminLawyerProfiles()->restoreProfile(string $profileId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.profileId` (required): {"type": "string"}
