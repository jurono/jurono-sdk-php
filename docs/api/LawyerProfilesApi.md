# Lawyer Profiles

Access with `$client->lawyerProfiles()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getOwn()` | `GET /api/lawyers/profile` | `LawyerProfilesController_getOwn` |
| `create()` | `POST /api/lawyers/profile` | `LawyerProfilesController_create` |
| `update()` | `PUT /api/lawyers/profile` | `LawyerProfilesController_update` |
| `delete()` | `DELETE /api/lawyers/profile` | `LawyerProfilesController_delete` |

## `getOwn()`

Get my lawyer profile

```php
$client->lawyerProfiles()->getOwn(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `create()`

Create my lawyer profile

```php
$client->lawyerProfiles()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateLawyerProfileDto"
      }
    }
  }
}
```


## `update()`

Update my lawyer profile

```php
$client->lawyerProfiles()->update(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateLawyerProfileDto"
      }
    }
  }
}
```


## `delete()`

Soft delete my lawyer profile

```php
$client->lawyerProfiles()->delete(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

