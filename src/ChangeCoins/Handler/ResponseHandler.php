<?php

declare(strict_types=1);

namespace ChangeCoins\Handler;

use ChangeCoins\Message\ResponseInterface;
use ChangeCoins\Middleware\ResponseMiddlewareInterface;

class ResponseHandler implements ResponseHandlerInterface
{
    /**
     * @var ResponseMiddlewareInterface[]
     */
    private $middlewares;

    /**
     * @param ResponseMiddlewareInterface[] $middlewares
     */
    public function __construct(array $middlewares = [])
    {
        $this->middlewares = array_map(function (ResponseMiddlewareInterface $middleware) {
            return $middleware;
        }, $middlewares);
    }

    /**
     * @inheritDoc
     */
    public function handle(ResponseInterface $response): ResponseInterface
    {
        if (count($this->middlewares) === 0) {
            return $response;
        }

        $middleware = array_shift($this->middlewares);

        return $middleware->process($response, $this);
    }
}
