<?php

declare(strict_types=1);

namespace Monobank\Response\Model;

final class Statement
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $time;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $mcc;

    /**
     * @var bool
     */
    private $hold;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $operationAmount;

    /**
     * @var int
     */
    private $currencyCode;

    /**
     * @var int
     */
    private $commissionRate;

    /**
     * @var int
     */
    private $cashbackAmount;

    /**
     * @var int
     */
    private $balance;

    public function __construct(
        string $id,
        int $time,
        string $description,
        int $mcc,
        bool $hold,
        int $amount,
        int $operationAmount,
        int $currencyCode,
        int $commissionRate,
        int $cashbackAmount,
        int $balance
    ) {
        $this->id = $id;
        $this->time = $time;
        $this->description = $description;
        $this->mcc = $mcc;
        $this->hold = $hold;
        $this->amount = $amount;
        $this->operationAmount = $operationAmount;
        $this->currencyCode = $currencyCode;
        $this->commissionRate = $commissionRate;
        $this->cashbackAmount = $cashbackAmount;
        $this->balance = $balance;
    }

    public static function fromResponse(array $data): self
    {
        return new self(
            $data['id'],
            $data['time'],
            $data['description'],
            $data['mcc'],
            $data['hold'],
            $data['amount'],
            $data['operationAmount'],
            $data['currencyCode'],
            $data['commissionRate'],
            $data['cashbackAmount'],
            $data['balance']
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function time(): int
    {
        return $this->time;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function mcc(): int
    {
        return $this->mcc;
    }

    public function isHold(): bool
    {
        return $this->hold;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function operationAmount(): int
    {
        return $this->operationAmount;
    }

    public function currencyCode(): int
    {
        return $this->currencyCode;
    }

    public function commissionRate(): int
    {
        return $this->commissionRate;
    }

    public function cashbackAmount(): int
    {
        return $this->cashbackAmount;
    }

    public function balance(): int
    {
        return $this->balance;
    }
}
