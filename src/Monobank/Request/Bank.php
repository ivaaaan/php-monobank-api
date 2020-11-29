<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Psr7\Request;
use Monobank\Exception\InternalErrorException;
use Monobank\Exception\MonobankException;
use Monobank\Exception\TooManyRequestsException;
use Monobank\Response\CurrencyRatesResponse;

final class Bank extends AbstractRequest
{
    /**
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     */
    public function getCurrencyRates(): CurrencyRatesResponse
    {
        $httpResponse = $this->makeRequest(new Request('GET', '/bank/currency'));

        return CurrencyRatesResponse::fromResponse($httpResponse);
    }
}
