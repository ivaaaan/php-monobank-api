<?php

declare(strict_types=1);

namespace Monobank;

use Monobank\Request\Bank;
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
     * @var Bank
     */
    public $bank;

    public function __construct(?string $accessToken = null)
    {
        $client = new Client([
            'base_uri' => self::$baseUrl,
            'headers' => [
                'X-Token' => $accessToken,
            ],
        ]);

        $this->personal = new Personal($client);
        $this->bank = new Bank($client);
    }
}
