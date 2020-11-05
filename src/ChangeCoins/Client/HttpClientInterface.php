<?php

declare(strict_types=1);

namespace ChangeCoins\Client;

use ChangeCoins\Client\ClientExceptionInterface;
use ChangeCoins\Message\RequestInterface;
use ChangeCoins\Message\ResponseInterface;

interface HttpClientInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(RequestInterface $request): ResponseInterface;
}

