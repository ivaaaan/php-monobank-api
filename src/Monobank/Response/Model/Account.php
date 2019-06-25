<?php

declare(strict_types=1);

namespace Monobank\Response\Model;

final class Account
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $balance;

    /**
     * @var int
     */
    private $creditLimit;

    /**
     * @var int
     */
    private $currencyCode;

    /**
     * @var string
     */
    private $cashbackType;

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
            $data['credit_limit'],
            $data['currency_code'],
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
