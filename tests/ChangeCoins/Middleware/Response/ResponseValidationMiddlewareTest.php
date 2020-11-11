<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Response;

use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\ResponseInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ResponseValidationMiddlewareTest extends TestCase
{
    /**
     * @var ResponseInterface|MockObject
     */
    private $responseMock;

    /**
     * @var ResponseHandlerInterface|MockObject
     */
    private $responseHandlerMock;

    protected function setUp(): void
    {
        $this->responseMock        = $this->getMockForAbstractClass(ResponseInterface::class);
        $this->responseHandlerMock = $this->getMockForAbstractClass(ResponseHandlerInterface::class);
    }

    /**
     * @param array $responseData
     *
     * @dataProvider validationErrorDataProvider
     */
    public function testProcess(array $responseData): void
    {
        $this->responseMock
            ->method('toArray')
            ->willReturn($responseData);

        if (count($responseData) === 0) {
            $this->responseHandlerMock
                ->expects($this->once())
                ->method('handle')
                ->with($this->equalTo($this->responseMock));
        } else {
            $this->responseHandlerMock
                ->expects($this->never())
                ->method('handle');

            $this->expectException(ResponseValidationException::class);
            $this->expectExceptionCode($responseData['err_code']);
            $this->expectExceptionMessage($responseData['err_description']);
        }

        $validationErrorMiddleware = new ResponseValidationMiddleware();
        $validationErrorMiddleware->process($this->responseMock, $this->responseHandlerMock);
    }

    /**
     * @return array[][]
     */
    public function validationErrorDataProvider(): array
    {
        return [
            'merchant not found error'    => [[
                'err_code'        => 101,
                'err_description' => 'Merchant Not Found',
            ]],
            'request data error'          => [[
                'err_code'        => 102,
                'err_description' => 'Request Data Error',
            ]],
            'forbidden request error'     => [[
                'err_code'        => 103,
                'err_description' => 'Forbidden this request',
            ]],
            'insufficient funds error'    => [[
                'err_code'        => 104,
                'err_description' => 'Insufficient Funds',
            ]],
            'currency not allowed error'  => [[
                'err_code'        => 106,
                'err_description' => 'Currency Not Allowed',
            ]],
            'Transaction not found error' => [[
                'err_code'        => 107,
                'err_description' => 'Transaction not found',
            ]],
            'without error'               => [[]],
        ];
    }
}
