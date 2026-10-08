# Legal Knowledge

Access with `$client->legalKnowledge()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `search()` | `GET /api/legal/search` | `LegalKnowledgeController_search` |
| `rebuildMandateRecommendations()` | `POST /api/mandates/{id}/legal-recommendations/rebuild` | `LegalKnowledgeController_rebuildMandateRecommendations` |
| `listMandateRecommendations()` | `GET /api/mandates/{id}/legal-recommendations` | `LegalKnowledgeController_listMandateRecommendations` |
| `acceptRecommendation()` | `POST /api/mandates/{id}/legal-recommendations/{recommendationId}/accept` | `LegalKnowledgeController_acceptRecommendation` |
| `dismissRecommendation()` | `POST /api/mandates/{id}/legal-recommendations/{recommendationId}/dismiss` | `LegalKnowledgeController_dismissRecommendation` |
| `createTaskFromRecommendation()` | `POST /api/mandates/{id}/legal-recommendations/{recommendationId}/task` | `LegalKnowledgeController_createTaskFromRecommendation` |

## `search()`

Search the German legal knowledge corpus

```php
$client->legalKnowledge()->search(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.q` (required): {"type": "string"}
- `query.type` (optional): {"type": "string", "enum": ["LAW", "REGULATION", "CASE_LAW", "ADMIN_RULE"]}
- `query.jurisdiction` (optional): {"example": "DE", "type": "string"}
- `query.applicableOn` (optional): {"format": "date-time", "type": "string"}
- `query.limit` (optional): {"minimum": 1, "maximum": 50, "default": 10, "type": "number"}

## `rebuildMandateRecommendations()`

Rebuild advisory legal research recommendations for a mandate

```php
$client->legalKnowledge()->rebuildMandateRecommendations(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `listMandateRecommendations()`

List advisory legal research recommendations for a mandate

```php
$client->legalKnowledge()->listMandateRecommendations(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `acceptRecommendation()`

Accept an advisory legal research recommendation

```php
$client->legalKnowledge()->acceptRecommendation(string $id, string $recommendationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.recommendationId` (required): {"type": "string"}

## `dismissRecommendation()`

Dismiss an advisory legal research recommendation

```php
$client->legalKnowledge()->dismissRecommendation(string $id, string $recommendationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.recommendationId` (required): {"type": "string"}

## `createTaskFromRecommendation()`

Create a task from an advisory legal research recommendation

```php
$client->legalKnowledge()->createTaskFromRecommendation(string $id, string $recommendationId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}
- `path.recommendationId` (required): {"type": "string"}
