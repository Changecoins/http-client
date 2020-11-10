<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

abstract class Request implements RequestInterface
{
    public const METHOD_GET  = 'GET';
    public const METHOD_POST = 'POST';

    public const API_VERSION_2       = 'v2';
    public const API_DEFAULT_VERSION = self::API_VERSION_2;

    /**
     * @var string
     */
//    private $baseUrl = 'https://apimerchant.changecoins.io';
    private $baseUrl = 'http://apimerchant.changecoins.local';

    /**
     * @return string
     */
    protected function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
