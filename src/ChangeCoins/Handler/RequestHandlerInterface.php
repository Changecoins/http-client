<?php

declare(strict_types=1);

namespace ChangeCoins\Handler;

use ChangeCoins\Message\RequestInterface;

interface RequestHandlerInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     */
    public function handle(RequestInterface $request): RequestInterface;
}
