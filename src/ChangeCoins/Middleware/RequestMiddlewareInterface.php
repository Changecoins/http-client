<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Message\RequestInterface;

interface RequestMiddlewareInterface
{
    /**
     * @param RequestInterface        $request
     * @param RequestHandlerInterface $handler
     *
     * @return RequestInterface
     */
    public function process(RequestInterface $request, RequestHandlerInterface $handler): RequestInterface;
}
