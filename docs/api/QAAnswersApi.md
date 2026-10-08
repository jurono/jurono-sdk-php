# Q&A Answers

Access with `$client->qAAnswers()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `list()` | `GET /api/qa/questions/{questionId}/answers` | `QaAnswersController_list` |
| `submit()` | `POST /api/qa/questions/{questionId}/answers` | `QaAnswersController_submit` |
| `update()` | `PUT /api/qa/questions/{questionId}/answers/{answerId}` | `QaAnswersController_update` |
| `withdraw()` | `POST /api/qa/questions/{questionId}/answers/{answerId}/withdraw` | `QaAnswersController_withdraw` |
| `rate()` | `POST /api/qa/questions/{questionId}/answers/{answerId}/rate` | `QaAnswersController_rate` |

## `list()`

List all answers for a question

```php
$client->qAAnswers()->list(string $questionId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.questionId` (required): {"type": "string"}

## `submit()`

Submit an answer to a question (lawyer)

```php
$client->qAAnswers()->submit(string $questionId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.questionId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SubmitAnswerDto"
      }
    }
  }
}
```


## `update()`

Update own answer (lawyer)

```php
$client->qAAnswers()->update(string $questionId, string $answerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.questionId` (required): {"type": "string"}
- `path.answerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateAnswerDto"
      }
    }
  }
}
```


## `withdraw()`

Withdraw own answer (lawyer)

```php
$client->qAAnswers()->withdraw(string $questionId, string $answerId, mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `path.questionId` (required): {"type": "string"}
- `path.answerId` (required): {"type": "string"}

## `rate()`

Rate an answer (client who owns the question)

```php
$client->qAAnswers()->rate(string $questionId, string $answerId, mixed $body, array $query = [], array $headers = [], array $options = []);
```

- `path.questionId` (required): {"type": "string"}
- `path.answerId` (required): {"type": "string"}

Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RateAnswerDto"
      }
    }
  }
}
```

