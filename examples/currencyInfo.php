<?php declare(strict_types=1);

use Monobank\Monobank;
use Monobank\Response\Model\CurrencyInfo;

require __DIR__.'/../vendor/autoload.php';

$monobank = new Monobank();

$rates = $monobank->bank->getCurrencyRates();

/** @var CurrencyInfo $currencyInfo */
foreach ($rates->rates() as $currencyInfo) {
    echo ($currencyInfo->rateBuy() ?? $currencyInfo->rateCross() ?? $currencyInfo->rateSell()) . "\n";
}