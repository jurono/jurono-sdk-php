# Auth

Access with `$client->auth()`.

| Method | HTTP route | Operation ID |
| --- | --- | --- |
| `login()` | `POST /api/auth/login` | `AuthController_login` |
| `register()` | `POST /api/auth/register` | `AuthController_register` |
| `me()` | `GET /api/auth/me` | `AuthController_me` |
| `mePersonas()` | `GET /api/auth/me/personas` | `AuthController_mePersonas` |
| `requestVerify()` | `POST /api/auth/verify-email/request` | `AuthController_requestVerify` |
| `resendVerification()` | `POST /api/auth/resend-verification` | `AuthController_resendVerification` |
| `verify()` | `GET /api/auth/verify-email` | `AuthController_verify` |
| `verifyPost()` | `POST /api/auth/verify-email` | `AuthController_verifyPost` |
| `resetRequest()` | `POST /api/auth/password/reset-request` | `AuthController_resetRequest` |
| `resetConfirm()` | `POST /api/auth/password/reset-confirm` | `AuthController_resetConfirm` |
| `refresh()` | `POST /api/auth/refresh` | `AuthController_refresh` |
| `switchActiveOrganization()` | `POST /api/auth/active-organization` | `AuthController_switchActiveOrganization` |
| `logout()` | `POST /api/auth/logout` | `AuthController_logout` |
| `logoutAll()` | `POST /api/auth/logout-all` | `AuthController_logoutAll` |
| `adminSetupStatus()` | `GET /api/auth/admin-setup-status` | `AuthController_adminSetupStatus` |
| `adminSetup()` | `POST /api/auth/admin-setup` | `AuthController_adminSetup` |
| `setup()` | `POST /api/auth/mfa/setup` | `MfaController_setup` |
| `mfaVerify()` | `POST /api/auth/mfa/verify` | `MfaController_verify` |
| `redeemRecoveryCode()` | `POST /api/auth/mfa/recovery-code/redeem` | `MfaController_redeemRecoveryCode` |
| `regenerateRecoveryCodes()` | `POST /api/auth/mfa/recovery-codes/regenerate` | `MfaController_regenerateRecoveryCodes` |
| `disable()` | `DELETE /api/auth/mfa` | `MfaController_disable` |
| `registerOptions()` | `POST /api/auth/webauthn/register/options` | `WebauthnController_registerOptions` |
| `registerVerify()` | `POST /api/auth/webauthn/register/verify` | `WebauthnController_registerVerify` |
| `loginOptions()` | `POST /api/auth/webauthn/login/options` | `WebauthnController_loginOptions` |
| `loginVerify()` | `POST /api/auth/webauthn/login/verify` | `WebauthnController_loginVerify` |
| `zitadelNativeAuthLogin()` | `POST /api/auth/zitadel/login` | `ZitadelNativeAuthController_login` |
| `zitadelNativeAuthRegister()` | `POST /api/auth/zitadel/register` | `ZitadelNativeAuthController_register` |
| `changePassword()` | `POST /api/auth/zitadel/password/change` | `ZitadelNativeAuthController_changePassword` |
| `zitadelOidcLogin()` | `GET /api/auth/oidc/zitadel/login` | `ZitadelOidcController_login` |
| `callback()` | `GET /api/auth/oidc/zitadel/callback` | `ZitadelOidcController_callback` |
| `zitadelOidcLogout()` | `POST /api/auth/oidc/zitadel/logout` | `ZitadelOidcController_logout` |

## `login()`

Login and get a JWT

```php
$client->auth()->login(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LoginDto"
      }
    }
  }
}
```


## `register()`

Register a new user

```php
$client->auth()->register(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RegisterDto"
      }
    }
  }
}
```


## `me()`

Get current user profile

```php
$client->auth()->me(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `mePersonas()`

Get current user personas

```php
$client->auth()->mePersonas(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `requestVerify()`

Request verification email

```php
$client->auth()->requestVerify(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `resendVerification()`

Resend verification email

```php
$client->auth()->resendVerification(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `verify()`

Verify email by token

```php
$client->auth()->verify(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.token` (required): {"type": "string"}

## `verifyPost()`

Verify email by token

```php
$client->auth()->verifyPost(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "type": "object",
        "required": [
          "token"
        ],
        "properties": {
          "token": {
            "type": "string"
          }
        }
      }
    }
  }
}
```


## `resetRequest()`

Request password reset

```php
$client->auth()->resetRequest(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PasswordResetRequestDto"
      }
    }
  }
}
```


## `resetConfirm()`

Confirm password reset

```php
$client->auth()->resetConfirm(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/PasswordResetConfirmDto"
      }
    }
  }
}
```


## `refresh()`

Refresh access token

```php
$client->auth()->refresh(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/RefreshDto"
      }
    }
  }
}
```


## `switchActiveOrganization()`

Switch active organization and issue new access token

```php
$client->auth()->switchActiveOrganization(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/SwitchActiveOrganizationDto"
      }
    }
  }
}
```


## `logout()`

Logout session (revoke refresh token)

```php
$client->auth()->logout(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LogoutDto"
      }
    }
  }
}
```


## `logoutAll()`

Logout all sessions for current user

```php
$client->auth()->logoutAll(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `adminSetupStatus()`

Check if platform needs initial admin setup

```php
$client->auth()->adminSetupStatus(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `adminSetup()`

Create the first admin account

```php
$client->auth()->adminSetup(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/AdminSetupDto"
      }
    }
  }
}
```


## `setup()`

Initialize MFA setup for current user

```php
$client->auth()->setup(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `mfaVerify()`

Verify TOTP token and enable MFA

```php
$client->auth()->mfaVerify(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/MfaVerifyDto"
      }
    }
  }
}
```


## `redeemRecoveryCode()`

Redeem a single-use MFA recovery code

```php
$client->auth()->redeemRecoveryCode(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/MfaRecoveryCodeDto"
      }
    }
  }
}
```


## `regenerateRecoveryCodes()`

Regenerate single-use MFA recovery codes

```php
$client->auth()->regenerateRecoveryCodes(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/MfaVerifyDto"
      }
    }
  }
}
```


## `disable()`

Disable MFA for current user

```php
$client->auth()->disable(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `registerOptions()`

Get WebAuthn registration options for current user

```php
$client->auth()->registerOptions(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `registerVerify()`

Verify WebAuthn registration response and store passkey

```php
$client->auth()->registerVerify(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/WebAuthnRegisterVerifyDto"
      }
    }
  }
}
```


## `loginOptions()`

Get WebAuthn login options by email

```php
$client->auth()->loginOptions(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/WebAuthnLoginOptionsDto"
      }
    }
  }
}
```


## `loginVerify()`

Verify WebAuthn login assertion and issue JWT + refresh token

```php
$client->auth()->loginVerify(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/WebAuthnLoginVerifyDto"
      }
    }
  }
}
```


## `zitadelNativeAuthLogin()`

Login through ZITADEL from the Jurono dashboard UI

```php
$client->auth()->zitadelNativeAuthLogin(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/LoginDto"
      }
    }
  }
}
```


## `zitadelNativeAuthRegister()`

Register a lawyer account through ZITADEL from the Jurono dashboard UI

```php
$client->auth()->zitadelNativeAuthRegister(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ZitadelRegisterDto"
      }
    }
  }
}
```


## `changePassword()`

Change the current user password in ZITADEL

```php
$client->auth()->changePassword(mixed $body, array $query = [], array $headers = [], array $options = []);
```


Request body schema:

```json
{
  "required": true,
  "content": {
    "application/json": {
      "schema": {
        "$ref": "#/components/schemas/ZitadelChangePasswordDto"
      }
    }
  }
}
```


## `zitadelOidcLogin()`

Start ZITADEL OIDC login

```php
$client->auth()->zitadelOidcLogin(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

- `query.redirectTo` (required): {"type": "string"}

## `callback()`

Handle ZITADEL OIDC callback and issue a Jurono session

```php
$client->auth()->callback(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```


## `zitadelOidcLogout()`

Clear local Jurono auth cookies before ZITADEL logout redirect

```php
$client->auth()->zitadelOidcLogout(mixed $body = null, array $query = [], array $headers = [], array $options = []);
```

