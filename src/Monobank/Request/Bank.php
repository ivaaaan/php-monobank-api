<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Psr7\Request;
use Monobank\Response\CurrencyRatesResponse;

final class Bank extends AbstractRequest
{
    public function getCurrencyRates()
    {
        $httpResponse = $this->makeRequest(new Request('GET', '/bank/currency'));

        return CurrencyRatesResponse::fromResponse($httpResponse);
    }
}
