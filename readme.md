# Laravel Nova Permission Tool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lizhineng/nova-permission-tool.svg?style=flat-square)](https://packagist.org/packages/lizhineng/nova-permission-tool)
[![Total Downloads](https://img.shields.io/packagist/dt/lizhineng/nova-permission-tool.svg?style=flat-square)](https://packagist.org/packages/lizhineng/nova-permission-tool)
![StyleCI](https://github.styleci.io/repos/146273887/shield?branch=master)
![MIT license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)

This is a Laravel Nova tool based on [Spatie permission package](https://github.com/spatie/laravel-permission) which lets you:

+ List all roles and permissions
+ List permissions by role
+ List roles by permissions
+ List users by roles & permissions
+ CRUD roles & permissions

#### Built-in filters

+ Guard Name Filter

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

You can publish the lang files and config file with:

```
php artisan vendor:publish --provider="Lizhineng\PermissionTool\ToolServiceProvider"
```

When published, the config file is located at `/config/permission-tool.php`, and the lang files are localed at `/resource/lang/vendor/permission-tool`.

## Usage

Click on the "Access Control" menu item in your Nova app to see the tool provided by this package.

### Config

Currently there is only one option can be edited in this package.

When you checkout the role/permission resource detail page, it will show you the users who has the role/permission below. The `models.user` option is to tell us which Eloquent model should be used to retrieve your users, and it must be a Laravel Nova resource model.

### Attach to users detail page

Thanks to Nova, that's pretty easy to attach roles fields or permissions fields to users detail page.

```php
// in app/Nova/User.php

// ...

public function fields()
{
    return [
        // ...

        MorphToMany::make('Roles', 'roles', \Lizhineng\PermissionTool\Role::class),

        MorphToMany::make('Permissions', 'permissions', \Lizhineng\PermissionTool\Permission::class),
    ];
}
```

And don't forget to use `Spatie\Permission\Traits\HasRoles` trait to your User model.

### Localization

The package is supported the following languages:

* English
* Simplified Chinese

When you publish the package lang files, you can make your own translation in `/resource/vendor/permission-tool/{locale}`.

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
