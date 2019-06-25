<?php

declare(strict_types=1);

namespace Monobank\Response;

use Monobank\Response\Model\Account;

final class ClientInfoResponse
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array|Account[]
     */
    private $accounts;

    public function __construct(string $name, array $accounts)
    {
        $this->name = $name;
        $this->accounts = $accounts;
    }

    public static function fromResponse(array $data): self
    {
        $accounts = array_map(function ($account) {
            return Account::fromResponse($account);
        }, $data['accounts']);

        return new self($data['name'], $accounts);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function accounts(): array
    {
        return $this->accounts;
    }
}
