# Q&A Questions

Access with `$client->qAQuestions()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/qa/questions` | `QaQuestionsController_list` |
| `create()` | `POST /api/qa/questions` | `QaQuestionsController_create` |
| `getById()` | `GET /api/qa/questions/{id}` | `QaQuestionsController_getById` |
| `update()` | `PUT /api/qa/questions/{id}` | `QaQuestionsController_update` |
| `close()` | `POST /api/qa/questions/{id}/close` | `QaQuestionsController_close` |
| `selectAnswer()` | `POST /api/qa/questions/{id}/select-answer` | `QaQuestionsController_selectAnswer` |

## `list()`

List legal questions with optional filters and pagination

```php
$client->qAQuestions()->list(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.status` (optional): {"enum": ["OPEN", "ANSWERED", "CLOSED", "CONVERTED_TO_MANDATE", "EXPIRED", "REFUNDED"], "type": "string"}
- `query.practiceAreaId` (optional): {"type": "string"}
- `query.country` (optional): {"example": "DEU", "type": "string"}
- `query.urgency` (optional): {"enum": ["LOW", "MEDIUM", "HIGH", "URGENT"], "type": "string"}
- `query.offset` (optional): {"example": 0, "type": "number"}
- `query.limit` (optional): {"example": 20, "type": "number"}

## `create()`

Create a new legal question (client)

```php
$client->qAQuestions()->create(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CreateQuestionDto"
      }
    }
  }
}
```


## `getById()`

Get a question by ID with its answers

```php
$client->qAQuestions()->getById(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `update()`

Update a question (owner only, question must be OPEN)

```php
$client->qAQuestions()->update(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateQuestionDto"
      }
    }
  }
}
```


## `close()`

Close a question (owner only)

```php
$client->qAQuestions()->close(string $id, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

## `selectAnswer()`

Select an answer as the accepted answer (owner only)

```php
$client->qAQuestions()->selectAnswer(string $id, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.id` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SelectAnswerDto"
      }
    }
  }
}
```

