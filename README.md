# laravel-stubs

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rawilk/laravel-stubs.svg?style=flat-square)](https://packagist.org/packages/rawilk/laravel-stubs)
![Tests](https://github.com/rawilk/laravel-stubs/workflows/Tests/badge.svg?style=flat-square)
[![Total Downloads](https://img.shields.io/packagist/dt/rawilk/laravel-stubs.svg?style=flat-square)](https://packagist.org/packages/rawilk/laravel-stubs)

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
