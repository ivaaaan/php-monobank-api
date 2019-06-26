<?php

use Monobank\Monobank;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank($argv[1]);

try {
    $clientInfo = $monobank->personal->getClientInfo();
} catch (Exception $exception) {
    exit($exception->getMessage());
}

echo $clientInfo->name(). '\n';
