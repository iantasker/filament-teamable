
![Banner](https://banners.beyondco.de/Filament%20Tenant.png?theme=light&packageManager=composer+require&packageName=iantasker%2Ffilament-tenant&pattern=architect&style=style_2&description=Tenant+Profile+Management&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/iantasker/filament-tenant.svg?style=flat-square)](https://packagist.org/packages/iantasker/filament-tenant)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/iantasker/filament-tenant/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/iantasker/filament-tenant/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/iantasker/filament-tenant/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/iantasker/filament-tenant/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/iantasker/filament-tenant.svg?style=flat-square)](https://packagist.org/packages/iantasker/filament-tenant)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require iantasker/filament-tenant
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-tenant-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-tenant-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-tenant-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentTenant = new FilamentTenant();
echo $filamentTenant->echoPhrase('Hello, FilamentTenant!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ian Tasker](https://github.com/iantasker)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
