<?php

declare(strict_types=1);

namespace ChangeCoins\Message;

abstract class Request implements RequestInterface
{
    public const METHOD_GET  = 'GET';
    public const METHOD_POST = 'POST';

    /**
     * @var string
     */
    private $baseUrl = 'https://apimerchant.changecoins.io';

    /**
     * @return string
     */
    protected function getBaseUrl(): string
    {
        return $this->baseUrl;
    }
}
