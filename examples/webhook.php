<?php declare(strict_types=1);

use Monobank\Monobank;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank('uW9LSFYxHe60Y1AlEKGXtJq4h5ooB--i51oQctTwsRnY');

$monobank->personal->setWebhook('https://google.com');
$monobank->personal->deleteWebhook();

