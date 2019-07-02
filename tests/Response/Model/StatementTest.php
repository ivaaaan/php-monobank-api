<?php

declare(strict_types=1);

namespace Tests\Response\Model;

use Monobank\Response\Model\Statement;
use PHPUnit\Framework\TestCase;

final class StatementTest extends TestCase
{
    public function testCreatingFromResponse()
    {
        $data = [
            'id' => 'test',
            'time' => 1562057001,
            'description' => 'test',
            'mcc' => 123,
            'hold' => false,
            'amount' => 500,
            'operationAmount' => 500,
            'currencyCode' => 1,
            'commissionRate' => 50,
            'cashbackAmount' => 50,
            'balance' => 1000,
        ];

        $statement = Statement::fromResponse($data);

        $this->assertEquals('test', $statement->id());
        $this->assertEquals((new \DateTime())->setTimestamp(1562057001), $statement->time());
        $this->assertEquals('test', $statement->description());
        $this->assertEquals(123, $statement->mcc());
        $this->assertEquals(false, $statement->isHold());
        $this->assertEquals(500, $statement->amount());
        $this->assertEquals(500, $statement->operationAmount());
        $this->assertEquals(1, $statement->currencyCode());
        $this->assertEquals(50, $statement->commissionRate());
        $this->assertEquals(50, $statement->cashbackAmount());
        $this->assertEquals(1000, $statement->balance());
    }
}
