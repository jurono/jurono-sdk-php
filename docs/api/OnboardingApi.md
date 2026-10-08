# Onboarding

Access with `$client->onboarding()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `getProgress()` | `GET /api/onboarding/progress` | `OnboardingController_getProgress` |
| `getNextStep()` | `GET /api/onboarding/next-step` | `OnboardingController_getNextStep` |
| `updateFirmDetails()` | `POST /api/onboarding/firm-details` | `OnboardingController_updateFirmDetails` |
| `updateRole()` | `POST /api/onboarding/role` | `OnboardingController_updateRole` |
| `updateGoal()` | `POST /api/onboarding/goal` | `OnboardingController_updateGoal` |
| `completeOnboarding()` | `POST /api/onboarding/complete` | `OnboardingController_completeOnboarding` |
| `completeChecklistItem()` | `POST /api/onboarding/checklist/complete` | `OnboardingController_completeChecklistItem` |
| `skipStep()` | `POST /api/onboarding/skip` | `OnboardingController_skipStep` |
| `trackFirstInquiry()` | `POST /api/onboarding/track/inquiry` | `OnboardingController_trackFirstInquiry` |
| `trackFirstMatter()` | `POST /api/onboarding/track/matter` | `OnboardingController_trackFirstMatter` |
| `trackFirstTeammate()` | `POST /api/onboarding/track/teammate` | `OnboardingController_trackFirstTeammate` |
| `trackSampleWorkspace()` | `POST /api/onboarding/track/sample-workspace` | `OnboardingController_trackSampleWorkspace` |

## `getProgress()`

Get onboarding progress for current organization

```php
$client->onboarding()->getProgress(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `getNextStep()`

Get recommended next step

```php
$client->onboarding()->getNextStep(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `updateFirmDetails()`

Update firm details

```php
$client->onboarding()->updateFirmDetails(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateFirmDetailsDto"
      }
    }
  }
}
```


## `updateRole()`

Update role selection

```php
$client->onboarding()->updateRole(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateRoleDto"
      }
    }
  }
}
```


## `updateGoal()`

Update primary goal

```php
$client->onboarding()->updateGoal(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/UpdateGoalDto"
      }
    }
  }
}
```


## `completeOnboarding()`

Complete onboarding

```php
$client->onboarding()->completeOnboarding(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `completeChecklistItem()`

Complete a checklist item

```php
$client->onboarding()->completeChecklistItem(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/CompleteChecklistItemDto"
      }
    }
  }
}
```


## `skipStep()`

Skip a step

```php
$client->onboarding()->skipStep(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SkipStepDto"
      }
    }
  }
}
```


## `trackFirstInquiry()`

Track first inquiry (called by inquiry service)

```php
$client->onboarding()->trackFirstInquiry(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `trackFirstMatter()`

Track first mandate (called by mandate service)

```php
$client->onboarding()->trackFirstMatter(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `trackFirstTeammate()`

Track first teammate (called by team service)

```php
$client->onboarding()->trackFirstTeammate(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `trackSampleWorkspace()`

Track sample workspace loaded

```php
$client->onboarding()->trackSampleWorkspace(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

