<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Request;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Request\RequestInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RequestSignerMiddlewareTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $requestMock;

    /**
     * @var RequestHandlerInterface|MockObject
     */
    private $requestHandlerMock;

    protected function setUp(): void
    {
        $this->requestMock        = $this->getMockForAbstractClass(RequestInterface::class);
        $this->requestHandlerMock = $this->getMockForAbstractClass(RequestHandlerInterface::class);
    }

    public function testProcess(): void
    {
        $testPublicKey = 'test-public-key';
        $testSecretKey = 'test-secret-key';
        $testRequestBody = [
            'param1' => 'value1',
            'param2' => 'value2',
            'param3' => 'value3',
        ];

        $testPayload   = $this->createPayload($testRequestBody);
        $testSignature = $this->createSignature($testPayload, $testSecretKey);

        $this->requestMock
            ->expects($this->exactly(3))
            ->method('withHeader')
            ->withConsecutive(
                [$this->equalTo('X-Processing-Key'), $this->equalTo($testPublicKey)],
                [$this->equalTo('X-Processing-Payload'), $this->equalTo($testPayload)],
                [$this->equalTo('X-Processing-Signature'), $this->equalTo($testSignature)]
            )
            ->willReturnOnConsecutiveCalls(
                $this->requestMock,
                $this->requestMock,
                $this->requestMock
            );
        $this->requestMock
            ->expects($this->exactly(2))
            ->method('getBody')
            ->willReturn($testRequestBody);

        $this->requestHandlerMock
            ->expects($this->once())
            ->method('handle')
            ->with($this->equalTo($this->requestMock));

        $signatureMiddleware = new RequestSignerMiddleware($testPublicKey, $testSecretKey);

        $this->assertInstanceOf(
            RequestInterface::class,
            $signatureMiddleware->process($this->requestMock, $this->requestHandlerMock)
        );
    }

    /**
     * @param string $testPayload
     * @param string $testSecretKey
     *
     * @return string
     */
    private function createSignature(string $testPayload, string $testSecretKey): string
    {
        return hash_hmac('sha256', $testPayload, $testSecretKey);
    }

    /**
     * @param array $testRequestBody
     *
     * @return string
     */
    private function createPayload(array $testRequestBody): string
    {
        return base64_encode(json_encode($testRequestBody, JSON_UNESCAPED_SLASHES));
    }
}
