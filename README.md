# laravel-stubs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rawilk/laravel-stubs.svg?style=flat-square)](https://packagist.org/packages/rawilk/laravel-stubs)
![Tests](https://github.com/rawilk/laravel-stubs/workflows/Tests/badge.svg?style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/rawilk/laravel-stubs.svg?style=flat-square)](https://packagist.org/packages/rawilk/laravel-stubs)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/rawilk/laravel-stubs?style=flat-square)](https://packagist.org/packages/rawilk/laravel-stubs)
[![License](https://img.shields.io/github/license/rawilk/laravel-stubs?style=flat-square)](https://github.com/rawilk/laravel-stubs/blob/main/LICENSE.md)

This repo contains opinionated versions of the Laravel stubs. The most notable changes are:

- migrations don't have a `down` function
- controllers don't extend a base controller
- none of the model attributes are guarded
- use return type hints where possible
- most docblocks have been removed
- `final` has been added to most classes
- `declare(strict_types=1);` added to most files

## Installation

You can install the package via composer:

```bash
composer require rawilk/laravel-stubs --dev
```

If you want to keep your stubs up-to-date with every update, add this composer hook to your composer.json file:

```json
"scripts": {
    "post-update-cmd": [
        "@php artisan custom-stub:publish --force"
    ]
}
```

## Usage

You can publish the stubs using this command:

```bash
php artisan custom-stub:publish
```

## Usage in Packages

If you're developing a package, you may pull these stubs in to your package and generate them just like you would with a normal Laravel project. This is possible when used with [Orchestral Canvas](https://github.com/orchestral/canvas). On your package project, run the following command:

```bash
composer require --dev rawilk/laravel-stubs orchestra/canvas
```

Next you need to run:

```bash
composer exec canvas preset package
```

Finally, modify the generated `canvas.yaml` file:

```yaml
preset: Rawilk\Stubs\Canvas\Package
namespace: YourPackageNamespace
```

To generate a file, you can run the following command:

```bash
composer exec canvas make:migration CreatePostsTable --create
```

Running this would generate a migration normally, just like the `php artisan make:migration` command would. For more information on canvas, please refer to their documentation.

**Tip:** Create an alias for `composer exec canvas` in your profile to allow easier entering of your generator commands. I personally added the following alias to my bash profile:

```bash
alias canvas="composer exec canvas"
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [Randall Wilk](https://github.com/rawilk)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
