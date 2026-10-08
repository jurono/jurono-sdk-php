# Admin - Email

Access with `$client->adminEmail()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `listTemplates()` | `GET /api/email/templates` | `EmailController_listTemplates` |
| `getTemplate()` | `GET /api/email/templates/{slug}` | `EmailController_getTemplate` |
| `previewEmail()` | `POST /api/email/preview` | `EmailController_previewEmail` |
| `sendCustomEmail()` | `POST /api/email/send-custom` | `EmailController_sendCustomEmail` |
| `sendTemplateEmail()` | `POST /api/email/send-template` | `EmailController_sendTemplateEmail` |

## `listTemplates()`

List email templates

```php
$client->adminEmail()->listTemplates(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getTemplate()`

Get email template by slug

```php
$client->adminEmail()->getTemplate(string $slug, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.slug` (required): {"type": "string"}

## `previewEmail()`

Preview rendered email

```php
$client->adminEmail()->previewEmail(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `sendCustomEmail()`

Send a custom email

```php
$client->adminEmail()->sendCustomEmail(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `sendTemplateEmail()`

Send email using a template

```php
$client->adminEmail()->sendTemplateEmail(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```
