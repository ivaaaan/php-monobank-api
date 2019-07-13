<?php declare(strict_types=1);

use Monobank\Monobank;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank();

$monobank->personal->setWebhook('https://google.com');
$monobank->personal->deleteWebhook();

