<?php

declare(strict_types=1);

namespace Tests\Response\Model;

use Monobank\Response\Model\CurrencyInfo;
use PHPUnit\Framework\TestCase;

final class CurrencyInfoTest extends TestCase
{
    /**
     * @dataProvider ratesDataProvider
     */
    public function testCreatingFromResponse(?float $rateSell, ?float $rateBuy, ?float $rateCross)
    {
        $data = [
            'currencyCodeA' => 1,
            'currencyCodeB' => 2,
            'date' => 1562057001,
            'rateSell' => $rateSell,
            'rateBuy' => $rateBuy,
            'rateCross' => $rateCross,
        ];

        $currencyInfo = CurrencyInfo::fromResponse($data);

        $this->assertEquals(1, $currencyInfo->currencyCodeA());
        $this->assertEquals(2, $currencyInfo->currencyCodeB());
        $this->assertEquals((new \DateTime())->setTimestamp(1562057001), $currencyInfo->date());
        $this->assertEquals($rateSell, $currencyInfo->rateSell());
        $this->assertEquals($rateBuy, $currencyInfo->rateBuy());
        $this->assertEquals($rateCross, $currencyInfo->rateCross());
    }

    public function ratesDataProvider()
    {
        return [
            [5.2, 5.3, 5.6],
            [5.2, null, 5.6],
            [null, 5.3, 5.6],
            [5.2, 5.3, null],
            [null, null, null],
        ];
    }
}
