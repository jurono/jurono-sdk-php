# PDF Templates

Access with `$client->pdfTemplates()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/pdf-templates/templates` | `PdfTemplatesController_list` |
| `get()` | `GET /api/pdf-templates/templates/{key}` | `PdfTemplatesController_get` |
| `listOrg()` | `GET /api/pdf-templates/org` | `PdfTemplatesController_listOrg` |
| `upsertOrg()` | `POST /api/pdf-templates/org` | `PdfTemplatesController_upsertOrg` |
| `getOrg()` | `GET /api/pdf-templates/org/{key}` | `PdfTemplatesController_getOrg` |
| `updateOrg()` | `PUT /api/pdf-templates/org/{key}` | `PdfTemplatesController_updateOrg` |
| `deleteOrg()` | `DELETE /api/pdf-templates/org/{key}` | `PdfTemplatesController_deleteOrg` |
| `getOrgCi()` | `GET /api/pdf-templates/org/ci` | `PdfTemplatesController_getOrgCi` |
| `updateOrgCi()` | `PUT /api/pdf-templates/org/ci` | `PdfTemplatesController_updateOrgCi` |
| `uploadLogo()` | `POST /api/pdf-templates/org/logo` | `PdfTemplatesController_uploadLogo` |

## `list()`

List available PDF templates

```php
$client->pdfTemplates()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `get()`

Get template meta and sample input

```php
$client->pdfTemplates()->get(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `listOrg()`

List organization templates

```php
$client->pdfTemplates()->listOrg(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `upsertOrg()`

Create or update an organization template

```php
$client->pdfTemplates()->upsertOrg(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getOrg()`

Get an organization template

```php
$client->pdfTemplates()->getOrg(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `updateOrg()`

Update an organization template

```php
$client->pdfTemplates()->updateOrg(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `deleteOrg()`

Delete an organization template

```php
$client->pdfTemplates()->deleteOrg(string $key, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.key` (required): {"type": "string"}

## `getOrgCi()`

Get organization CI settings

```php
$client->pdfTemplates()->getOrgCi(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateOrgCi()`

Update organization CI settings

```php
$client->pdfTemplates()->updateOrgCi(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `uploadLogo()`

Upload organization logo for PDFs

```php
$client->pdfTemplates()->uploadLogo(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
