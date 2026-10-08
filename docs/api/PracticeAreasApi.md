# Practice Areas

Access with `$client->practiceAreas()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/practice-areas` | `PracticeAreasController_list` |
| `detail()` | `GET /api/practice-areas/{identifier}` | `PracticeAreasController_detail` |
| `translations()` | `GET /api/practice-areas/{identifier}/translations` | `PracticeAreasController_translations` |

## `list()`

List practice areas with localized translations

```php
$client->practiceAreas()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.language` (optional): {"example": "de", "type": "string"}
- `query.country` (optional): {"example": "DE", "type": "string"}

## `detail()`

Get a single practice area with translations

```php
$client->practiceAreas()->detail(string $identifier, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.identifier` (required): {"type": "string"}
- `query.language` (optional): {"example": "de", "type": "string"}

## `translations()`

Get all translations for a practice area

```php
$client->practiceAreas()->translations(string $identifier, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.identifier` (required): {"type": "string"}
