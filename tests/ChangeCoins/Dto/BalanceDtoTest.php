<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class BalanceDtoTest extends TestCase
{
    public function testToArray(): void
    {
        $testNonce = 123456;

        $balanceDto = new BalanceDto();
        $balanceDto->setNonce($testNonce);

        $this->assertEquals(['nonce' => $testNonce], $balanceDto->toArray());
    }
}
