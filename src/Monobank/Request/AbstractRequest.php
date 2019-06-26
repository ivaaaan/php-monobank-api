<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Monobank\Exception\Factory;

abstract class AbstractRequest
{
    /**
     * @var ClientInterface|Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Monobank\Exception\InvalidAccountException
     * @throws \Monobank\Exception\InternalErrorException
     * @throws \Monobank\Exception\MonobankException
     * @throws \Monobank\Exception\TooManyRequestsException
     * @throws \Monobank\Exception\UnknownTokenException
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
