<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Exception\ClientExceptionInterface;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Request\ResponseInterface;

interface ClientInterface
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
