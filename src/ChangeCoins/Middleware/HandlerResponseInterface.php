<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware;

use ChangeCoins\Message\ResponseInterface;

interface HandlerResponseInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function handle(ResponseInterface $response): ResponseInterface;
}
