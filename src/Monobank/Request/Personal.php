<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Psr7\Request;
use Monobank\Response\ClientInfoResponse;
use Monobank\Response\StatementResponse;

final class Personal extends AbstractRequest
{
    /**
     * @throws \Monobank\Exception\InvalidAccountException
     * @throws \Monobank\Exception\InternalErrorException
     * @throws \Monobank\Exception\MonobankException
     * @throws \Monobank\Exception\TooManyRequestsException
     * @throws \Monobank\Exception\UnknownTokenException
     */
    public function getClientInfo(): ClientInfoResponse
    {
        $httpResponse = $this->makeRequest(new Request('GET', '/personal/client-info'));

        return ClientInfoResponse::fromResponse($httpResponse);
    }

    /**
     * @throws \Monobank\Exception\InvalidAccountException
     * @throws \Monobank\Exception\InternalErrorException
     * @throws \Monobank\Exception\MonobankException
     * @throws \Monobank\Exception\TooManyRequestsException
     * @throws \Monobank\Exception\UnknownTokenException
     * @throws \Monobank\Exception\InvalidAccountException
     */
    public function getStatement(string $account, \DateTime $from, \DateTime $to = null): StatementResponse
    {
        $httpResponse = $this->makeRequest(
            new Request(
                'GET',
                sprintf('/personal/statement/%s/%s/%s', $account, $from->getTimestamp(), $to ? $to->getTimestamp() : '')
            )
        );

        return StatementResponse::fromResponse($httpResponse);
    }
}
