<?php

use Monobank\Monobank;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank($argv[1]);

$statements = $monobank->personal->getStatement($argv[2], (new DateTime())->modify('-1 day'));
foreach ($statements->statements() as $statement) {
    echo $statement->id() . "\n";
}