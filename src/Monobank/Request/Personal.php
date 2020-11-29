<?php

declare(strict_types=1);

namespace Monobank\Request;

use DateTime;
use GuzzleHttp\Psr7\Request;
use Monobank\Exception\InternalErrorException;
use Monobank\Exception\InvalidAccountException;
use Monobank\Exception\MonobankException;
use Monobank\Exception\TooManyRequestsException;
use Monobank\Exception\UnknownTokenException;
use Monobank\Response\ClientInfoResponse;
use Monobank\Response\StatementResponse;

final class Personal extends AbstractRequest
{
    /**
     * @throws InvalidAccountException
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     * @throws UnknownTokenException
     */
    public function getClientInfo(): ClientInfoResponse
    {
        $httpResponse = $this->makeRequest(new Request('GET', '/personal/client-info'));

        return ClientInfoResponse::fromResponse($httpResponse);
    }

    /**
     * @throws InvalidAccountException
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     * @throws UnknownTokenException
     * @throws InvalidAccountException
     */
    public function getStatement(string $account, DateTime $from, DateTime $to = null): StatementResponse
    {
        $httpResponse = $this->makeRequest(
            new Request(
                'GET',
                sprintf('/personal/statement/%s/%s/%s', $account, $from->getTimestamp(), $to ? $to->getTimestamp() : '')
            )
        );

        return StatementResponse::fromResponse($httpResponse);
    }

    /**
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     * @throws UnknownTokenException
     */
    public function setWebhook(string $url): bool
    {
        $httpResponse = $this->makeRequest(
            new Request(
                'POST',
                '/personal/webhook',
                ['Content-type' => 'application/json'],
                json_encode(['webHookUrl' => $url])
            )
        );

        return ($httpResponse['status'] ?? null) === 'ok';
    }

    /**
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     * @throws UnknownTokenException
     */
    public function deleteWebhook(): bool
    {
        return $this->setWebhook('');
    }
}
