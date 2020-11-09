<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Exception\ClientExceptionInterface;
use ChangeCoins\Message\RequestInterface;
use ChangeCoins\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     *
     * @throws ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(RequestInterface $request): ResponseInterface;
}
