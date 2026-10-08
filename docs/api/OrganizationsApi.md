# Organizations

Access with `$client->organizations()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/organizations` | `OrganizationsController_list` |
| `create()` | `POST /api/organizations` | `OrganizationsController_create` |
| `getById()` | `GET /api/organizations/{id}` | `OrganizationsController_getById` |
| `update()` | `PUT /api/organizations/{id}` | `OrganizationsController_update` |
| `getMyContext()` | `GET /api/organizations/me/context` | `OrganizationsController_getMyContext` |
| `listMembers()` | `GET /api/organizations/{id}/members` | `OrganizationsController_listMembers` |
| `addMember()` | `POST /api/organizations/{id}/members` | `OrganizationsController_addMember` |
| `updateMember()` | `PUT /api/organizations/{id}/members/{memberId}` | `OrganizationsController_updateMember` |
| `removeMember()` | `DELETE /api/organizations/{id}/members/{memberId}` | `OrganizationsController_removeMember` |
| `invite()` | `POST /api/organizations/{id}/invitations` | `OrganizationsController_invite` |
| `cancelInvitation()` | `DELETE /api/organizations/{id}/invitations/{invitationId}` | `OrganizationsController_cancelInvitation` |
| `accept()` | `POST /api/organizations/invitations/accept` | `OrganizationsController_accept` |

## `list()`

List organizations (admin) with filters

```php
$client->organizations()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"minLength": 2, "maxLength": 255, "example": "Acme Law", "type": "string"}
- `query.subscriptionTier` (optional): {"$ref": "#/components/schemas/SubscriptionTier"}
- `query.subscriptionStatus` (optional): {"$ref": "#/components/schemas/SubscriptionStatus"}
- `query.country` (optional): {"maxLength": 2, "example": "DE", "type": "string"}
- `query.city` (optional): {"maxLength": 100, "example": "Berlin", "type": "string"}
- `query.offset` (optional): {"minimum": 0, "default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"minimum": 1, "maximum": 100, "default": 20, "example": 20, "type": "number"}

## `create()`

Create organization (admin)

```php
$client->organizations()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateOrganizationDto"
      }
    }
  }
}
```


## `getById()`

Get organization by ID (admin)

```php
$client->organizations()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update organization (admin)

```php
$client->organizations()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateOrganizationDto"
      }
    }
  }
}
```


## `getMyContext()`

Resolve current user active organization context

```php
$client->organizations()->getMyContext(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `listMembers()`

List organization members (admin)

```php
$client->organizations()->listMembers(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.status` (optional): {"$ref": "#/components/schemas/MembershipStatus"}
- `query.offset` (optional): {"minimum": 0, "default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"minimum": 1, "maximum": 100, "default": 20, "example": 20, "type": "number"}

## `addMember()`

Add or update member (admin)

```php
$client->organizations()->addMember(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AddMemberDto"
      }
    }
  }
}
```


## `updateMember()`

Update member (admin)

```php
$client->organizations()->updateMember(string $id, string $memberId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.memberId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateMemberDto"
      }
    }
  }
}
```


## `removeMember()`

Remove member (admin)

```php
$client->organizations()->removeMember(string $id, string $memberId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.memberId` (required): {"type": "string"}

## `invite()`

Invite member by email (admin)

```php
$client->organizations()->invite(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/InviteMemberDto"
      }
    }
  }
}
```


## `cancelInvitation()`

Cancel invitation (admin)

```php
$client->organizations()->cancelInvitation(string $id, string $invitationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.invitationId` (required): {"type": "string"}

## `accept()`

Accept organization invitation

```php
$client->organizations()->accept(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
