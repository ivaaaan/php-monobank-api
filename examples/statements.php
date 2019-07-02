<?php

use Monobank\Exception\InvalidAccountException;
use Monobank\Monobank;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank($argv[1]);

try {
    $statements = $monobank->personal->getStatement($argv[2], (new DateTime())->modify('-1 day'));
} catch (InvalidAccountException $exception) {
    exit('Invalid account '.$argv[2]);
} catch (Exception $exception) {
    exit($exception->getMessage());
}

foreach ($statements->statements() as $statement) {
    echo $statement->id() . "\n";
}