<?php

declare(strict_types=1);

namespace Monobank;

use Monobank\Request\Personal;
use GuzzleHttp\Client;

final class Monobank
{
    private static $baseUrl = 'https://api.monobank.ua';

    /**
     * @var Personal
     */
    public $personal;

    /**
     * @var string
     */
    private $accessToken;

    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;

        $client = new Client([
            'base_uri' => self::$baseUrl,
            'headers' => [
                'X-Token' => $this->accessToken,
            ],
        ]);

        $this->personal = new Personal($client);
    }
}
