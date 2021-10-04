# Anper\RussianId\Laravel

[![Software License][ico-license]](LICENSE.md)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-ga]][link-ga]

A set of useful Laravel validation rules for identifiers of Russian individuals and legal entities.

## Install

``` bash
$ composer require anper/russian-id-laravel
```

The package will automatically register itself.

## Translations

If you wish to edit the package translations, you can run the following command to publish them into your `resources/lang` folder

``` bash
$ php artisan vendor:publish --provider="Anper\RussianId\Laravel\RussianIdServiceProvider"
```

## Available rules

* Anper\RussianId\Laravel\Rules\BikRule
* Anper\RussianId\Laravel\Rules\InnRule
* Anper\RussianId\Laravel\Rules\KppRule
* Anper\RussianId\Laravel\Rules\KsRule
* Anper\RussianId\Laravel\Rules\LegalInnRule
* Anper\RussianId\Laravel\Rules\OgrnipRule
* Anper\RussianId\Laravel\Rules\OgrnOrOgrnipRule
* Anper\RussianId\Laravel\Rules\OgrnRule
* Anper\RussianId\Laravel\Rules\OmsRule
* Anper\RussianId\Laravel\Rules\PersonInnRule
* Anper\RussianId\Laravel\Rules\RsRule
* Anper\RussianId\Laravel\Rules\SnilsRule

The `KsRule` and `RsRule` require the `BIK` attribute in the validated data. You must provide the attribute name in them constructors.

```php
<?php

use Anper\RussianId\Laravel\Rules\BikRule;
use Anper\RussianId\Laravel\Rules\KsRule;
use Anper\RussianId\Laravel\Rules\RsRule;
use Illuminate\Support\Facades\Validator;

$validator = Validator::make([
    'bik_field'=> '...',
    'ks_field' => '...',
    'rs_field' => '...',
], [
    'bik_field'=> new BikRule(),
    'ks_field' => new KsRule('bik_field'),
    'rs_field' => new RsRule('bik_field'),
]);
```

## Tests

### Unit testing
The package is tested with [PHPUnit](https://github.com/sebastianbergmann/phpunit). To run tests:
``` bash
$ composer test
```

### Static analysis

The code is statically analyzed with [PHPStan](https://github.com/phpstan/phpstan). To run static analysis:
``` bash
$ composer stan
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anper/russian-id-laravel.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-ga]: https://github.com/perevoshchikov/russian-id-laravel/actions/workflows/build.yml/badge.svg

[link-packagist]: https://packagist.org/packages/anper/russian-id-laravel
[link-ga]: https://github.com/perevoshchikov/russian-id-laravel/actions/workflows/build.yml
