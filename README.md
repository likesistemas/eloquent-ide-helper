# [eloquent-ide-helper] Using `barryvdh/laravel-ide-helper` without laravel framework.

## Installation

```shell
composer require --dev likesistemas/eloquent-ide-helper
```

## How to configure?

To configure it, create a `ide-helper.php` file in the project root (where composer.json is located) and define the settings that `barryvdh/laravel-ide-helper` defines in its documentation.

```php
use Like\Eloquent\IdeHelper\Config;

return new Config([
    'ide-helper.model_locations' => [
        'sql/models/'
    ],
]);
```

## Usage

A binary called `ide-helper` is available which can be used with the same functionality as the original library.

```shell
ide-helper models # Create the models.
```

## Thanks

To assemble this library I used the reference of a task from the main repository, thanks [@mfn](https://github.com/mfn) for the guidelines.

https://github.com/barryvdh/laravel-ide-helper/issues/756
