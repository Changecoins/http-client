<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use PHPUnit\Framework\TestCase;

class RequestConfigTest extends TestCase
{
    public function testConstruct(): void
    {
        $testSecretKey = 'test-secret-key';
        $testPublicKey = 'test-public-key';
        $testOptions = [
            'foo' => 'bar',
            'bar' => 'bas',
        ];

        $requestConfig = new RequestConfig($testPublicKey, $testSecretKey, $testOptions);

        $this->assertEquals($testSecretKey, $requestConfig->getSecretKey());
        $this->assertEquals($testPublicKey, $requestConfig->getPublicKey());
        $this->assertEquals($testOptions, $requestConfig->getOptions());
    }
}
