<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

use ChangeCoins\Enum\Api;
use PHPUnit\Framework\TestCase;

class HttpRequestTest extends TestCase
{
    /**
     * @var string[]
     */
    private $defaultHeaders = [
        'Accept' => 'Application/json',
    ];

    /**
     * @var array
     */
    private $defaultOptions = [
        CURLOPT_USERAGENT      => 'ChangeCoins-PHP-SDK',
        CURLOPT_HEADER         => false,
        CURLINFO_HEADER_OUT    => true,
        CURLOPT_RETURNTRANSFER => true,
    ];

    /**
     * @var HttpRequest
     */
    private $request;

    protected function setUp(): void
    {
        $this->request = new HttpRequest();
    }

    public function testDefaultParams(): void
    {
        $this->assertEquals($this->defaultHeaders, $this->request->getHeaders());
        $this->assertEquals($this->defaultOptions, $this->request->getOptions());
    }

    public function testWithHeaders(): void
    {
        $testHeaders = [
            'header-name-1' => 'header-value-1',
            'header-name-2' => 'header-value-2',
            'header-name-3' => 'header-value-3',
        ];

        $this->request->withHeaders($testHeaders);

        $this->assertEquals($testHeaders, $this->request->getHeaders());
    }

    public function testWithHeader(): void
    {
        $this->request
            ->withHeader('header-name-1', 'header-value-1')
            ->withHeader('header-name-2', 'header-value-2')
            ->withHeader('header-name-3', 'header-value-3');

        $this->assertEquals(
            array_merge(
                $this->defaultHeaders,
                [
                    'header-name-1' => 'header-value-1',
                    'header-name-2' => 'header-value-2',
                    'header-name-3' => 'header-value-3',
                ]
            ),
            $this->request->getHeaders()
        );
    }

    public function testGetHeaders(): void
    {
        $this->assertEquals($this->defaultHeaders, $this->request->getHeaders());
    }

    public function testHasHeader(): void
    {
        $this->assertTrue($this->request->hasHeader('Accept'));
        $this->assertFalse($this->request->hasHeader('Client'));
    }

    public function testGetOptions(): void
    {
        $this->assertIsArray($this->request->getOptions());
        $this->assertEquals($this->defaultOptions, $this->request->getOptions());
    }

    public function testWithUrl(): void
    {
        $testUrl = 'test/url';

        $this->request->withUrl($testUrl);
        $this->assertEquals($testUrl, $this->request->getUrl());
    }

    public function testGetFullUrl(): void
    {
        $testUrl = 'test/url';
        $baseUrl = 'https://apimerchant.changecoins.io';
        $this->request->withUrl($testUrl);

        $this->assertEquals(
            sprintf('%s/%s/%s', $baseUrl, Api::API_DEFAULT_VERSION, $testUrl),
            $this->request->getFullUrl()
        );
    }

    public function testGetMethod(): void
    {
        $this->request->withMethod(Request::METHOD_GET);

        $this->assertEquals(Request::METHOD_GET, $this->request->getMethod());
    }

    public function testGetBody(): void
    {
        $testData = [
            'foo' => 'bar',
            'boo' => 'baz',
        ];

        $this->request->withBody($testData);

        $this->assertEquals($testData, $this->request->getBody());
        $this->assertEquals(json_encode($testData), $this->request->getBodyAsJson());
    }
}
