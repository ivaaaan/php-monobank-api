# PHP library for Monobank API

## Installation

`$ composer require iillexial/php-monobank-api`

## Examples

### Get statements

```php
$monobank = new Monobank\Monobank('token');
$statements = $monobank->personal->getStatements('account_id', new DateTime());

foreach ($statements->statements() as $statement) {
    echo $statement->id() . "\n";
}
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

## TODO

- [ ] Tests
- [ ] Docs


## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
