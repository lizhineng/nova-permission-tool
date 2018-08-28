# Laravel Nova Permission Tool

![StyleCI](https://github.styleci.io/repos/146273887/shield?branch=master)
![GitHub](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)

This is a Laravel Nova tool based on [Spatie permission package](https://github.com/spatie/laravel-permission) which lets you:

+ List all roles and permissions
+ List permissions by role
+ List roles by permissions
+ List users by roles & permissions
+ CRUD roles & permissions

![screenshot of the permission tool](https://raw.githubusercontent.com/lizhineng/nova-permission-tool/master/docs/screenshot.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require lizhineng/nova-permission-tool
```

Next up, you must register the tool with Nova. This is typically done in the `tools` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function tools()
{
    return [
        // ...
        new \Lizhineng\PermissionTool\PermissionTool,
    ];
}
```

## Usage

Click on the "Access Control" menu item in your Nova app to see the tool provided by this package.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email lizhineng@gmail.com instead of using the issue tracker.

## Credits

- [Spatie](https://github.com/spatie)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
