<?php

declare(strict_types=1);

namespace ChangeCoins\Handler;

use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Middleware\RequestMiddlewareInterface;

class RequestHandler implements RequestHandlerInterface
{
    /**
     * @var RequestMiddlewareInterface[]
     */
    private $middlewares;

    /**
     * @param RequestMiddlewareInterface[] $middlewares
     */
    public function __construct(array $middlewares = [])
    {
        $this->middlewares = array_map(function (RequestMiddlewareInterface $middleware) {
            return $middleware;
        }, $middlewares);
    }

    /**
     * @inheritdoc
     */
    public function handle(RequestInterface $request): RequestInterface
    {
        if (count($this->middlewares) === 0) {
            return $request;
        }

        $middleware = array_shift($this->middlewares);

        return $middleware->process($request, $this);
    }
}
