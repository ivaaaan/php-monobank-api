<?php

declare(strict_types=1);

namespace Monobank\Response\Model;

use DateTime;
use DateTimeInterface;

final class Statement
{
    private string $id;

    private int $time;

    private string $description;

    private int $mcc;

    private bool $hold;

    private int $amount;

    private int $operationAmount;

    private int $currencyCode;

    private int $commissionRate;

    private int $cashbackAmount;

    private int $balance;

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

    public function time(): DateTimeInterface
    {
        return (new DateTime())->setTimestamp($this->time);
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
