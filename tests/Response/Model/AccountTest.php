<?php

declare(strict_types=1);

namespace Tests\Response\Model;

use Monobank\Response\Model\Account;
use PHPUnit\Framework\TestCase;

final class AccountTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $data = [
            'id' => 'id',
            'balance' => 5000,
            'creditLimit' => 5000,
            'currencyCode' => 1,
            'cashbackType' => 'test',
        ];

        $account = Account::fromResponse($data);

        $this->assertEquals('id', $account->id());
        $this->assertEquals(5000, $account->balance());
        $this->assertEquals(5000, $account->creditLimit());
        $this->assertEquals(1, $account->currencyCode());
        $this->assertEquals('test', $account->cashbackType());
    }
}
