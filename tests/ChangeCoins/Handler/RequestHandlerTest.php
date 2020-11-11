<?php

declare(strict_types=1);

namespace ChangeCoins\Handler;

use ChangeCoins\Middleware\RequestMiddlewareInterface;
use ChangeCoins\Request\RequestInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RequestHandlerTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $requestMock;

    /**
     * @var RequestMiddlewareInterface|MockObject
     */
    private $requestMiddlewareMock;

    protected function setUp(): void
    {
        $this->requestMock           = $this->getMockForAbstractClass(RequestInterface::class);
        $this->requestMiddlewareMock = $this->getMockForAbstractClass(RequestMiddlewareInterface::class);
    }

    public function testHandle(): void
    {
        $requestMiddlewareMock1 = clone $this->requestMiddlewareMock;
        $requestMiddlewareMock2 = clone $this->requestMiddlewareMock;

        $requestHandler = new RequestHandler([
            $this->requestMiddlewareMock,
            $requestMiddlewareMock1,
            $requestMiddlewareMock2,
        ]);

        $this->requestMiddlewareMock
            ->expects($this->once())
            ->method('process')
            ->with(
                $this->equalTo($this->requestMock),
                $this->equalTo($requestHandler)
            );
        $requestMiddlewareMock1
            ->expects($this->once())
            ->method('process')
            ->with(
                $this->equalTo($this->requestMock),
                $this->equalTo($requestHandler)
            );
        $requestMiddlewareMock2
            ->expects($this->once())
            ->method('process')
            ->with(
                $this->equalTo($this->requestMock),
                $this->equalTo($requestHandler)
            );

        $this->assertInstanceOf(RequestInterface::class, $requestHandler->handle($this->requestMock));
    }
}
