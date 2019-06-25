<?php

declare(strict_types=1);

namespace Monobank\Response;

use Monobank\Response\Model\CurrencyInfo;

final class CurrencyRatesResponse
{
    /**
     * @var array|CurrencyInfo[]
     */
    private $rates;

    public function __construct(array $rates)
    {
        $this->rates = $rates;
    }

    public static function fromResponse(array $data): self
    {
        return new self(array_map(function (array $currencyInfo) {
            return CurrencyInfo::fromResponse($currencyInfo);
        }, $data));
    }

    public function rates(): array
    {
        return $this->rates;
    }
}
