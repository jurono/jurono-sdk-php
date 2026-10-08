# Lawyer Team Management

Access with `$client->lawyerTeamManagement()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listMembers()` | `GET /api/lawyers/me/team/members` | `LawyerTeamController_listMembers` |
| `addMember()` | `POST /api/lawyers/me/team/members` | `LawyerTeamController_addMember` |
| `updateMember()` | `PUT /api/lawyers/me/team/members/{memberId}` | `LawyerTeamController_updateMember` |
| `removeMember()` | `DELETE /api/lawyers/me/team/members/{memberId}` | `LawyerTeamController_removeMember` |
| `invite()` | `POST /api/lawyers/me/team/invitations` | `LawyerTeamController_invite` |
| `listInvitations()` | `GET /api/lawyers/me/team/invitations` | `LawyerTeamController_listInvitations` |
| `cancelInvitation()` | `DELETE /api/lawyers/me/team/invitations/{invitationId}` | `LawyerTeamController_cancelInvitation` |
| `resendInvitation()` | `POST /api/lawyers/me/team/invitations/{invitationId}/resend` | `LawyerTeamController_resendInvitation` |

## `listMembers()`

List my organization team members

```php
$client->lawyerTeamManagement()->listMembers(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (optional): {"$ref": "#/components/schemas/MembershipStatus"}
- `query.offset` (optional): {"minimum": 0, "default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"minimum": 1, "maximum": 100, "default": 20, "example": 20, "type": "number"}

## `addMember()`

Add member to my organization

```php
$client->lawyerTeamManagement()->addMember(mixed $body, array $query = [], array $headers = [], array $options = []);
```


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

Update team member in my organization

```php
$client->lawyerTeamManagement()->updateMember(string $memberId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

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

Remove team member from my organization

```php
$client->lawyerTeamManagement()->removeMember(string $memberId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.memberId` (required): {"type": "string"}

## `invite()`

Invite member to my organization by email

```php
$client->lawyerTeamManagement()->invite(mixed $body, array $query = [], array $headers = [], array $options = []);
```


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


## `listInvitations()`

List pending invitations for my organization

```php
$client->lawyerTeamManagement()->listInvitations(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `cancelInvitation()`

Cancel pending invitation

```php
$client->lawyerTeamManagement()->cancelInvitation(string $invitationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.invitationId` (required): {"type": "string"}

## `resendInvitation()`

Resend invitation email

```php
$client->lawyerTeamManagement()->resendInvitation(string $invitationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.invitationId` (required): {"type": "string"}
