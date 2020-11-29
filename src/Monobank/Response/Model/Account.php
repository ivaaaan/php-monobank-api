<?php

declare(strict_types=1);

namespace Monobank\Response\Model;

final class Account
{
    private string $id;

    private int $balance;

    private int $creditLimit;

    private int $currencyCode;

    private string $cashbackType;

    public function __construct(string $id, int $balance, int $creditLimit, int $currencyCode, string $cashbackType)
    {
        $this->id = $id;
        $this->balance = $balance;
        $this->creditLimit = $creditLimit;
        $this->currencyCode = $currencyCode;
        $this->cashbackType = $cashbackType;
    }

    public static function fromResponse(array $data): self
    {
        return new self(
            $data['id'],
            $data['balance'],
            $data['creditLimit'],
            $data['currencyCode'],
            $data['cashbackType']
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function balance(): int
    {
        return $this->balance;
    }

    public function creditLimit(): int
    {
        return $this->creditLimit;
    }

    public function currencyCode(): int
    {
        return $this->currencyCode;
    }

    public function cashbackType(): string
    {
        return $this->cashbackType;
    }
}
