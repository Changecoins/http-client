<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use ChangeCoins\ClientInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ClientFactoryTest extends TestCase
{
    /**
     * @var RequestConfig|MockObject
     */
    private $requestConfigMock;

    protected function setUp(): void
    {
        $this->requestConfigMock = $this->getMockBuilder(RequestConfigInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();
    }

    public function testCreate(): void
    {
        $this->requestConfigMock
            ->expects($this->once())
            ->method('getSecretKey')
            ->willReturn('secrete-key');
        $this->requestConfigMock
            ->expects($this->once())
            ->method('getPublicKey')
            ->willReturn('secrete-key');

        $clientFactory = new ClientFactory($this->requestConfigMock);

        $this->assertInstanceOf(ClientInterface::class, $clientFactory->create());
    }
}
