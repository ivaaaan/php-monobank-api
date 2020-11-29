<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Monobank\Exception\Factory;
use Monobank\Exception\InternalErrorException;
use Monobank\Exception\InvalidAccountException;
use Monobank\Exception\MonobankException;
use Monobank\Exception\TooManyRequestsException;
use Monobank\Exception\UnknownTokenException;

abstract class AbstractRequest
{
    protected ClientInterface $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws InvalidAccountException
     * @throws InternalErrorException
     * @throws MonobankException
     * @throws TooManyRequestsException
     * @throws UnknownTokenException
     */
    protected function makeRequest(Request $request): array
    {
        try {
            $response = $this->client->send($request);
        } catch (RequestException $exception) {
            throw Factory::createFromResponse($exception->getResponse());
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
