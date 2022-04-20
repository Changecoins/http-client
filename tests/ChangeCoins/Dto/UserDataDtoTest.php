<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class UserDataDtoTest extends TestCase
{
    public function testToArray(): void
    {
        $testPayee = 'test-payee';
        $testMemo = '456';

        $userDataDto = new UserDataDto();
        $userDataDto->setPayee($testPayee);
        $userDataDto->setMemo($testMemo);

        $this->assertEquals(
            ['payee' => $testPayee, 'memo' => $testMemo],
            $userDataDto->toArray()
        );
    }
}
