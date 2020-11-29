<?php

declare(strict_types=1);

namespace Monobank;

use GuzzleHttp\Client;
use Monobank\Request\Bank;
use Monobank\Request\Personal;

final class Monobank
{
    private static string $baseUrl = 'https://api.monobank.ua';

    public Personal $personal;

    public Bank $bank;

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
