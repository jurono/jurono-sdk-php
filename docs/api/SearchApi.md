# Search

Access with `$client->search()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `search()` | `GET /api/search` | `SearchController_search` |
| `workspaceSearch()` | `GET /api/search/workspace` | `SearchController_workspaceSearch` |

## `search()`

Search across lawyers, cases, and content

```php
$client->search()->search(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (required): {"type": "string"}

## `workspaceSearch()`

Search accessible workspace objects for the authenticated tenant user

```php
$client->search()->workspaceSearch(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (required): {"type": "string"}
