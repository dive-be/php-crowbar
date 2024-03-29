<p align="center"><img src="https://github.com/dive-be/php-crowbar/blob/master/art/socialcard.jpg?raw=true" alt="Social Card of PHP Crowbar"></p>

# Access private methods / properties

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dive-be/php-crowbar.svg?style=flat-square)](https://packagist.org/packages/dive-be/php-crowbar)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/dive-be/php-crowbar/Tests?label=tests)](https://github.com/dive-be/php-crowbar/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/dive-be/php-crowbar.svg?style=flat-square)](https://packagist.org/packages/dive-be/php-crowbar)

This package allows you to access methods / properties in a class with a restricted access modifier i.e. `private` / `protected`.

## Installation

You can install the package via composer:

```bash
composer require dive-be/php-crowbar
```

## Usage

Assume the following class with a `private` property. 
It offers no way to read / write its `$content` property.

```php
class SealedCrate
{
    public function __construct(
        private string $content,
    ) {}
    
    private function peek(): string
    {
        return $this->content;
    }
}

$crate = new SealedCrate('Apples');
```

You can get the property using the `Crowbar`:

```php
Crowbar::pry($crate)->content; // Apples
```

You can set the property:

```php
Crowbar::pry($crate)->content; // Original: Apples

Crowbar::pry($crate)->content = 'Strawberries';

Crowbar::pry($crate)->content; // Altered: Strawberries
```

You can also invoke private methods:

```php
Crowbar::pry($crate)->peek(); // Strawberries
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email oss@dive.be instead of using the issue tracker.

## Credits

- [Muhammed Sari](https://github.com/mabdullahsari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
