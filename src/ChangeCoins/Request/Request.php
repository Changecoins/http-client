<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

abstract class Request implements RequestInterface
{
    public const METHOD_GET  = 'GET';
    public const METHOD_POST = 'POST';

    /**
     * @var string
     */
    /* private $baseUrl = 'https://apimerchant.changecoins.io'; */
    private $baseUrl = 'http://apimerchant.changecoins.local';

    /**
     * @return string
     */
    protected function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
