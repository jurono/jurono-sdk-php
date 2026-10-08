# Directory

Access with `$client->directory()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `findLawyers()` | `GET /api/directory/lawyers` | `DirectoryController_findLawyers` |
| `getStats()` | `GET /api/directory/stats` | `DirectoryController_getStats` |
| `getSearchSuggestions()` | `GET /api/directory/search/suggestions` | `DirectoryController_getSearchSuggestions` |
| `getLawyer()` | `GET /api/directory/lawyers/{id}` | `DirectoryController_getLawyer` |
| `getLawyerBySlug()` | `GET /api/directory/lawyers/slug/{slug}` | `DirectoryController_getLawyerBySlug` |
| `contactLawyer()` | `POST /api/directory/lawyers/{id}/contact` | `DirectoryController_contactLawyer` |

## `findLawyers()`

Search lawyers in the public directory

```php
$client->directory()->findLawyers(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"example": "Schmidt", "type": "string"}
- `query.city` (optional): {"example": "Berlin", "type": "string"}
- `query.country` (optional): {"example": "DE", "type": "string"}
- `query.language` (optional): {"example": "de", "type": "string"}
- `query.lang` (optional): {"default": "de", "example": "de", "type": "string"}
- `query.practiceAreaId` (optional): {"example": "pa_family-law", "type": "string"}
- `query.isVerified` (optional): {"example": true, "type": "boolean"}
- `query.acceptsNewClients` (optional): {"example": true, "type": "boolean"}
- `query.minRating` (optional): {"example": 4, "type": "number"}
- `query.maxHourlyRate` (optional): {"example": 300, "type": "number"}
- `query.isFachanwalt` (optional): {"example": true, "type": "boolean"}
- `query.includeDemoProfiles` (optional): {"default": false, "example": false, "type": "boolean"}
- `query.offset` (optional): {"default": 0, "example": 0, "type": "number"}
- `query.limit` (optional): {"default": 20, "example": 20, "type": "number"}

## `getStats()`

Get aggregate directory statistics

```php
$client->directory()->getStats(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getSearchSuggestions()`

Get search suggestions for the directory

```php
$client->directory()->getSearchSuggestions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (optional): {"example": "Berlin", "type": "string"}
- `query.type` (optional): {"example": "all", "type": "string"}
- `query.includeDemoProfiles` (optional): {"default": false, "example": false, "type": "boolean"}

## `getLawyer()`

Get a lawyer profile by ID

```php
$client->directory()->getLawyer(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `query.lang` (optional): {"default": "de", "example": "de", "type": "string"}
- `query.includeDemoProfiles` (optional): {"default": false, "example": false, "type": "boolean"}

## `getLawyerBySlug()`

Get a lawyer profile by URL slug

```php
$client->directory()->getLawyerBySlug(string $slug, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.slug` (required): {"type": "string"}
- `query.lang` (optional): {"default": "de", "example": "de", "type": "string"}
- `query.includeDemoProfiles` (optional): {"default": false, "example": false, "type": "boolean"}

## `contactLawyer()`

Submit an unauthenticated contact request for a lawyer

```php
$client->directory()->contactLawyer(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ContactLawyerDto"
      }
    }
  }
}
```
