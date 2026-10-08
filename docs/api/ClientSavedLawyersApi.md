# Client Saved Lawyers

Access with `$client->clientSavedLawyers()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/client/saved-lawyers` | `SavedLawyersController_list` |
| `save()` | `POST /api/client/saved-lawyers` | `SavedLawyersController_save` |
| `isSaved()` | `GET /api/client/saved-lawyers/{lawyerId}` | `SavedLawyersController_isSaved` |
| `remove()` | `DELETE /api/client/saved-lawyers/{lawyerId}` | `SavedLawyersController_remove` |

## `list()`

List saved lawyers for current client

```php
$client->clientSavedLawyers()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `save()`

Save a lawyer for current client

```php
$client->clientSavedLawyers()->save(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `isSaved()`

Check if a lawyer is saved by current client

```php
$client->clientSavedLawyers()->isSaved(string $lawyerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}

## `remove()`

Remove a saved lawyer for current client

```php
$client->clientSavedLawyers()->remove(string $lawyerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.lawyerId` (required): {"type": "string"}
