# Looker PHP SDK Advanced

API version: 3.1.0

This package is an advanced version of generated [Looker PHP SDK](https://github.com/alexkart/looker-php-sdk).
It adds additional functionality and simplifies the work with the Looker API. You can interact with the whole API
that Looker provides with just one Looker object and don't worry about anything else.
Currently, it provides the following additional functionality:
- Provides a single wrapper object for various SDK classes
- Automates authentication process
- Automatically renews expired access tokens and stores them into the persistent storage
- ... more will be added later

## Installation & Usage
### Composer

```
composer require alexkart/looker-php-sdk-advanced
```

### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/looker-php-sdk-advanced/vendor/autoload.php');
```


## Getting Started

See usage examples in the [**examples**](examples) folder.

### Basic example
In order to start interacting with the API you just need to instantiate Looker object and provide a
config with the Looker host and valid credentials (API client id and API client secret):

```php
$config = new \App\CustomLookerConfiguration(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
);
$looker = new \Alexkart\Looker\Looker($config);
```

Then you can call any API endpoint like this:
```php
$looks = $looker->lookApi->searchLooks(null, 'test');
$dashboards = $looker->dashboardApi->allDashboards(['title']);
$folders = $looker->folderApi->allFolders();
```

The complete working example you can find here [**basic.php**](examples/basic.php)

This is the simplest way to interact with the API, it will request a new access token each time the
Looker object is instantiated. Alternatively you can provide an existing access token and it 
will be used to authenticate requests to the API.

```php
$config = new \Alexkart\Looker\LookerConfiguration(
    'https://looker-host:19999/api/3.1',
    '',
    '',
    'access-token'
);
$looker = new \Alexkart\Looker\Looker($config);
```

You can provide both access token and API credentials:
```php
$config = new \Alexkart\Looker\LookerConfiguration(
    'https://looker-host:19999/api/3.1',
    'client-id',
    'client-secret',
    'optional-access-token'
);
$looker = new \Alexkart\Looker\Looker($config);
```
The access token you provided will be used until it is valid and when it expires a new token will be
requested automatically. You can check if the token has been renewed like this:
```php
if ($looker->getConfig()->isAccessTokenRenewed()) {
    $token = $looker->getConfig()->getAccessToken();
}
```
If you want the access token to be stored into the persistent storage (database, cache, file, etc.)
automatically when it is renewed you can extend `LookerConfiguration` class and provide implementation
for the `storeAccessToken()` method and use this class to instantiate `Looker` object:
```php
class CustomLookerConfiguration extends \Alexkart\Looker\LookerConfiguration {
    public function storeAccessToken($accessToken): void {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt', $accessToken);
    }
}
```
This method will be called when new access token is requested from the API.
Additionally, you can implement `loadAccessToken()` method and it will be used to get the access token
from your storage. You will just need to provide API credentials and it will handle the work with access
tokens for you.
```php
class CustomLookerConfiguration extends \Alexkart\Looker\LookerConfiguration {
    public function storeAccessToken($accessToken): void {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt', $accessToken);
    }
    public function loadAccessToken(): string {
        return (string)file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'looker_access_token.txt');
    }
}
```
The complete working example you can see here [**custom_configuration.php**](examples/custom_configuration.php)