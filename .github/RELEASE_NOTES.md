Official PHP SDK for the Jurono legal services API. Requires PHP 8.2 or later.

- 765 operations across 84 services from the API 2.0.0 public OpenAPI contract snapshot, including form-builder endpoints.
- Bearer-token and API-key authentication, JSON bodies, multipart uploads, and streamed downloads.
- Complete response envelopes and structured API/network exceptions.

Download the named `.zip` or `.tar.gz` asset for a bundle including locked runtime dependencies.
Extract it and require `autoload.php`. `SHA256SUMS.txt` contains archive checksums.
GitHub's automatic source archives require `composer install`.

Composer installation:

```sh
composer config repositories.jurono vcs https://github.com/jurono/jurono-sdk-php.git
composer require jurono/sdk-php:^0.1
```

See the README and generated API reference for usage.
