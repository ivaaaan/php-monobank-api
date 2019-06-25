<?php

declare(strict_types=1);

namespace Monobank\Response\Model;

final class CurrencyInfo
{
    /**
     * @var int
     */
    private $currencyCodeA;

    /**
     * @var int
     */
    private $currencyCodeB;

    /**
     * @var int
     */
    private $date;

    /**
     * @var float
     */
    private $rateSell;

    /**
     * @var float|null
     */
    private $rateBuy;

    /**
     * @var float|null
     */
    private $rateCross;

    public function __construct(
        int $currencyCodeA,
        int $currencyCodeB,
        int $date,
        ?float $rateSell = null,
        ?float $rateBuy = null,
        ?float $rateCross = null
    ) {
        $this->currencyCodeA = $currencyCodeA;
        $this->currencyCodeB = $currencyCodeB;
        $this->date = $date;
        $this->rateSell = $rateSell;
        $this->rateBuy = $rateBuy;
        $this->rateCross = $rateCross;
    }

    public static function fromResponse(array $data)
    {
        return new self(
            $data['currencyCodeA'],
            $data['currencyCodeB'],
            $data['date'],
            $data['rateSell'] ?? null,
            $data['rateBuy'] ?? null,
            $data['rateCross'] ?? null
        );
    }

    public function currencyCodeA(): int
    {
        return $this->currencyCodeA;
    }

    public function currencyCodeB(): int
    {
        return $this->currencyCodeB;
    }

    public function date(): \DateTime
    {
        return (new \DateTime())->setTimestamp($this->date);
    }

    public function rateSell(): ?float
    {
        return $this->rateSell;
    }

    public function rateBuy(): ?float
    {
        return $this->rateBuy;
    }

    public function rateCross(): ?float
    {
        return $this->rateCross;
    }
}
