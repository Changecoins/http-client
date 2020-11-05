<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware;

use ChangeCoins\Message\RequestInterface;

interface HandlerRequestInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    public function handle(RequestInterface $request): RequestInterface;
}
