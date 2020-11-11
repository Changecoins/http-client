<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class UserDataDtoTest extends TestCase
{
    public function testToArray(): void
    {
        $testPayee = 'test-payee';

        $userDataDto = new UserDataDto();
        $userDataDto->setPayee($testPayee);

        $this->assertEquals(['payee' => $testPayee], $userDataDto->toArray());
    }
}
