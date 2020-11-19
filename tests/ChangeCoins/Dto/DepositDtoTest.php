<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class DepositDtoTest extends TestCase
{
    /**
     * @param array $invoiceData
     *
     * @dataProvider invoiceDtoDataProvider
     */
    public function testToArray(array $invoiceData): void
    {
        $invoiceCreateDto = new DepositDto();

        $invoiceCreateDto->setExternalId($invoiceData['externalid']);
        $invoiceCreateDto->setCurrency($invoiceData['currency']);
        $invoiceCreateDto->setCurrencyConvert($invoiceData['currency_convert']);
        $invoiceCreateDto->setNonce($invoiceData['nonce']);

        if ($invoiceData['title'] !== null) {
            $invoiceCreateDto->setTitle($invoiceData['title']);
        }

        if ($invoiceData['description'] !== null) {
            $invoiceCreateDto->setDescription($invoiceData['description']);
        }

        if ($invoiceData['limit_minute'] !== null) {
            $invoiceCreateDto->setLimitMinute($invoiceData['limit_minute']);
        }

        if ($invoiceData['callback_url'] !== null) {
            $invoiceCreateDto->setCallbackUrl($invoiceData['callback_url']);
        }

        $this->assertEquals($invoiceData, $invoiceCreateDto->toArray());
    }

    /**
     * @return array[][]
     */
    public function invoiceDtoDataProvider(): array
    {
        return [
            'full filled Dto'      => [
                [
                    'externalid'       => 'external-id',
                    'title'            => 'test tile',
                    'description'      => 'test description',
                    'amount'           => 0.00,
                    'currency'         => 'USD',
                    'currency_convert' => 'EUR',
                    'limit_minute'     => 6,
                    'return_url'       => ' ',
                    'callback_url'     => 'http://test-callback-url.com',
                    'nonce'            => 300,
                    'type'             => 'deposit',
                ],
            ],
            'partially_filled Dto' => [
                [
                    'externalid'       => 'external-id',
                    'title'            => null,
                    'description'      => null,
                    'amount'           => 0.00,
                    'currency'         => 'USD',
                    'currency_convert' => 'EUR',
                    'limit_minute'     => null,
                    'return_url'       => ' ',
                    'callback_url'     => null,
                    'nonce'            => 300,
                    'type'             => 'deposit',
                ],
            ]
        ];
    }
}
