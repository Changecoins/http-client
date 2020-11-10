<?php

declare(strict_types=1);

namespace ChangeCoins\Handler;

use ChangeCoins\Request\ResponseInterface;

interface ResponseHandlerInterface
{
    /**
     * @param ResponseInterface $response
     *
     * @return ResponseInterface
     */
    public function handle(ResponseInterface $response): ResponseInterface;
}
