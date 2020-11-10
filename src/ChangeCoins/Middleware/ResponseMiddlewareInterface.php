<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware;

use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\ResponseInterface;

interface ResponseMiddlewareInterface
{
    /**
     * @param ResponseInterface         $response
     * @param ResponseHandlerInterface $handler
     *
     * @return ResponseInterface
     */
    public function process(ResponseInterface $response, ResponseHandlerInterface $handler): ResponseInterface;
}
