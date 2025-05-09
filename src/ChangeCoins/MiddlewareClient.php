<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Request\ResponseInterface;
use ChangeCoins\Transport\TransportInterface;

class MiddlewareClient implements ClientInterface
{
    /**
     * @var TransportInterface
     */
    private $transport;

    /**
     * @var RequestHandlerInterface
     */
    private $requestHandler;

    /**
     * @var ResponseHandlerInterface
     */
    private $responseHandler;

    /**
     * @param TransportInterface       $transport
     * @param RequestHandlerInterface  $requestHandler
     * @param ResponseHandlerInterface $responseHandler
     */
    public function __construct(
        TransportInterface $transport,
        RequestHandlerInterface $requestHandler,
        ResponseHandlerInterface $responseHandler
    ) {
        $this->transport       = $transport;
        $this->requestHandler  = $requestHandler;
        $this->responseHandler = $responseHandler;
    }

    /**
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $handler = clone $this->requestHandler;

        $response = $this->transport->sendRequest($handler->handle($request));

        return $this->responseHandler->handle($response);
    }
}
