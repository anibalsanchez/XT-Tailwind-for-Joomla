# Create Pattern

## Description

A lightweight PHP implementation of the Static Create Pattern using a trait.

`composer require anibalsanchez/create-pattern`

Inspired by [byjg/SingletonPatternPHP](https://github.com/byjg/SingletonPatternPHP)

## Usage

### Create your class

```php
require "vendor/autoload.php";

class Example
{
    // You need to use the trait here
    use \Extly\Infrastructure\Creator\CreatorTrait;
    use \Extly\Infrastructure\Creator\SingletonTrait;

    // Put your code below
}
```

### Use your class

```php
$example = Example::create();
```

```php
$example = Example::getInstance();
```

## Install

Just type: `composer require anibalsanchez/create-pattern`

## References

* https://en.wikipedia.org/wiki/Singleton_pattern

## License

The MIT License (MIT)
