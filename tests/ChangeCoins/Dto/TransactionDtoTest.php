<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class TransactionDtoTest extends TestCase
{
    public function testToArray(): void
    {
        $testExternalId = 'test-external-id';
        $testNonce      = 123456;

        $transactionDto = new TransactionDto();
        $transactionDto
            ->setExternalId($testExternalId)
            ->setNonce($testNonce);

        $this->assertEquals(
            [
                'externalid' => $testExternalId,
                'nonce'      => $testNonce,
            ],
            $transactionDto->toArray()
        );
    }
}
