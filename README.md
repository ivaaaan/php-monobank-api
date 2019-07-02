# PHP library for Monobank API

[![Build Status](https://travis-ci.org/ivaaaan/php-monobank-api.svg?branch=master)](https://travis-ci.org/ivaaaan/php-monobank-api)

## Requirements

* PHP >=7.2
* ext-json
* ext-curl

## Install

Via Composer

`$ composer require iillexial/php-monobank-api`

## Usage

See [examples](/examples) for more.

### Get statements

```php
$monobank = new Monobank\Monobank('token');
$statements = $monobank->personal->getStatements('account_id', new DateTime());
```

### Get client info

```php
$monobank = new Monobank\Monobank('token');
$clientInfo = $monobank->personal->getClientInfo();

```

### Get currency rates

```php
$monobank = new Monobank\Monobank();
$rates = $monobank->bank->getCurrencyRates();
```

## Testing

Just run:

`$ composer test`


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
