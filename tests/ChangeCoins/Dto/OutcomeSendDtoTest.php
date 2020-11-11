<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OutcomeSendDtoTest extends TestCase
{
    /**
     * @var UserDataDto|MockObject
     */
    private $userDtoMock;

    protected function setUp(): void
    {
        $this->userDtoMock = $this->getMockBuilder(UserDataDto::class)->getMock();
    }

    /**
     * @param array $outcomeData
     *
     * @dataProvider outcomeSendDataProvider
     */
    public function testToArray(array $outcomeData)
    {
        $this->userDtoMock
            ->method('toArray')
            ->willReturn($outcomeData['userdata']);

        $outcomeSendDto = new OutcomeSendDto();
        $outcomeSendDto
            ->setExternalId($outcomeData['externalid'])
            ->setAmount($outcomeData['amount'])
            ->setCurrency($outcomeData['currency'])
            ->setUserdata($this->userDtoMock)
            ->setNonce($outcomeData['nonce']);

        if ($outcomeData['callback_url'] !== null) {
            $outcomeSendDto->setCallbackUrl($outcomeData['callback_url']);
        }

        $this->assertEquals($outcomeData, $outcomeSendDto->toArray());
    }

    /**
     * @return array[][]
     */
    public function outcomeSendDataProvider(): array
    {
        return [
            'full filled data'      => [
                [
                    'externalid'   => 'external-id-1',
                    'amount'       => 100.00,
                    'currency'     => 'USD',
                    'userdata'     => [
                        'payee' => 'DRmuo7gzDeXEyGPCtq3DBRbcn8bNgchtaq'
                    ],
                    'callback_url' => 'http://test-callback-url.com',
                    'nonce'        => 123456,
                ],
            ],
            'partially filled data' => [
                [
                    'externalid'   => 'external-id-2',
                    'amount'       => 200.00,
                    'currency'     => 'EUR',
                    'userdata'     => [
                        'payee' => 'DRmuo7gzDeXEyGPCtq3DBRbcn8bNgchtaq'
                    ],
                    'callback_url' => null,
                    'nonce'        => 654321,
                ]
            ],
        ];
    }
}
