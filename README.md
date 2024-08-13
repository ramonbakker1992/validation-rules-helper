# This package allows validation rules to be defined globally and reused. This way you can use the same rules for your Controller, Action classes, API post/update routes, Livewire and other sections.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ramonbakker1992/validation-rules-helper.svg?style=flat-square)](https://packagist.org/packages/ramonbakker1992/validation-rules-helper)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ramonbakker1992/validation-rules-helper/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ramonbakker1992/validation-rules-helper/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ramonbakker1992/validation-rules-helper/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ramonbakker1992/validation-rules-helper/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ramonbakker1992/validation-rules-helper.svg?style=flat-square)](https://packagist.org/packages/ramonbakker1992/validation-rules-helper)

This package allows validation rules to be defined globally and reused. This way you can use the same rules for your Controller, Action classes, API post/update routes, Livewire and other sections.

## Installation

You can install the package via composer:

```bash
composer require ramonbakker1992/validation-rules-helper
```

## Usage

Create a validation class that extends `ValidationRules`

```php
class ProjectValidation extends ValidationRules
{
    protected function validation()
    {
        return [
            'name' => 'string|max:100',
            'number' => 'numeric|between:1000,9999',
            'start_date' => 'date',
            'end_date' => 'date|after_or_equal:start_date',
        ];
    }
}
```

Use in controller, action class or where ever you need the validation rules:

```php
$rules = ProjectValidation::rules()
    ->required([
        'name',
        'start_date' => 'required_with:end_date'
    ])
    ->all();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Ramon Bakker](https://github.com/ramonbakker1992)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
