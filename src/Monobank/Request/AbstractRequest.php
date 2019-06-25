<?php

declare(strict_types=1);

namespace Monobank\Request;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

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

    protected function makeRequest(Request $request): array
    {
        $response = $this->client->send($request);

        return json_decode($response->getBody()->getContents(), true);
    }
}
