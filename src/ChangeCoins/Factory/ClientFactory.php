<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use ChangeCoins\ClientInterface;
use ChangeCoins\Handler\RequestHandler;
use ChangeCoins\Handler\ResponseHandler;
use ChangeCoins\Middleware\Request\SignerMiddleware;
use ChangeCoins\MiddlewareClient;
use ChangeCoins\Transport\CurlTransport;

final class ClientFactory implements ClientFactoryInterface
{
    /**
     * @var RequestConfig
     */
    private $requestConfig;

    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig)
    {
        $this->requestConfig = $requestConfig;
    }

    /**
     * @inheritDoc
     */
    public function create(): ClientInterface
    {
        return new MiddlewareClient(
            new CurlTransport($this->requestConfig),
            new RequestHandler([
                new SignerMiddleware(
                    $this->requestConfig->getSecretKey(),
                    $this->requestConfig->getPublicKey()
                )
            ]),
            new ResponseHandler()
        );
    }
}
