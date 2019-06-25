# PHP library for Monobank API

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
$clientInfo = $monobank->getClientInfo();


```

## TODO

- [ ] Implement `/bank/currency`
- [ ] Error handling
- [ ] Tests
- [ ] Docs

