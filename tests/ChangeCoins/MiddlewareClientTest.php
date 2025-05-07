<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Request\ResponseInterface;
use ChangeCoins\Transport\TransportInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MiddlewareClientTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $requestMock;

    /**
     * @var ResponseInterface|MockObject
     */
    private $responseMock;

    /**
     * @var TransportInterface|MockObject
     */
    private $transportMock;

    /**
     * @var RequestHandlerInterface|MockObject
     */
    private $requestHandlerMock;

    /**
     * @var ResponseHandlerInterface|MockObject
     */
    private $responseHandlerMock;

    protected function setUp(): void
    {
        $this->requestMock         = $this->getMockForAbstractClass(RequestInterface::class);
        $this->responseMock        = $this->getMockForAbstractClass(ResponseInterface::class);
        $this->transportMock       = $this->getMockForAbstractClass(TransportInterface::class);
        $this->requestHandlerMock  = $this->getMockForAbstractClass(RequestHandlerInterface::class);
        $this->responseHandlerMock = $this->getMockForAbstractClass(ResponseHandlerInterface::class);
    }

    public function testSendRequest(): void
    {
        $this->requestHandlerMock
            ->expects($this->exactly(2))
            ->method('handle')
            ->with($this->equalTo($this->requestMock))
            ->willReturn($this->requestMock);

        $this->transportMock
            ->expects($this->exactly(2))
            ->method('sendRequest')
            ->with($this->equalTo($this->requestMock))
            ->willReturn($this->responseMock);

        $this->responseHandlerMock
            ->expects($this->exactly(2))
            ->method('handle')
            ->with($this->equalTo($this->responseMock))
            ->willReturn($this->responseMock);

        $client = new MiddlewareClient(
            $this->transportMock,
            $this->requestHandlerMock,
            $this->responseHandlerMock
        );

        $client->sendRequest($this->requestMock);
        $client->sendRequest($this->requestMock);
    }
}
