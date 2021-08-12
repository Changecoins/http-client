<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class DepositDtoTest extends TestCase
{
    /**
     * @param array $depositData
     *
     * @dataProvider depositDtoDataProvider
     */
    public function testToArray(array $depositData): void
    {
        $depositCreateDto = new DepositDto();

        $depositCreateDto->setExternalId($depositData['externalid']);
        $depositCreateDto->setCurrency($depositData['currency']);
        $depositCreateDto->setCurrencyConvert($depositData['currency_convert']);
        $depositCreateDto->setNonce($depositData['nonce']);

        if ($depositData['title'] !== null) {
            $depositCreateDto->setTitle($depositData['title']);
        }

        if ($depositData['description'] !== null) {
            $depositCreateDto->setDescription($depositData['description']);
        }

        if ($depositData['limit_minute'] !== null) {
            $depositCreateDto->setLimitMinute($depositData['limit_minute']);
        }

        if ($depositData['callback_url'] !== null) {
            $depositCreateDto->setCallbackUrl($depositData['callback_url']);
        }

        $this->assertEquals($depositData, $depositCreateDto->toArray());
    }

    /**
     * @return array[][]
     */
    public function depositDtoDataProvider(): array
    {
        return [
            'full filled Dto'      => [
                [
                    'externalid'       => 'external-id',
                    'title'            => 'test tile',
                    'description'      => 'test description',
                    'currency'         => 'USD',
                    'currency_convert' => 'EUR',
                    'limit_minute'     => 6,
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
                    'currency'         => 'USD',
                    'currency_convert' => 'EUR',
                    'limit_minute'     => null,
                    'callback_url'     => null,
                    'nonce'            => 300,
                    'type'             => 'deposit',
                ],
            ]
        ];
    }
}
