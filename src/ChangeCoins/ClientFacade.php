<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

final class ClientFacade
{
    /**
     * @var RequestConfig
     */
    private $config;

    /**
     * @param RequestConfig $config
     */
    public function __construct(RequestConfig $config)
    {
        $this->config = $config;
    }

    /**
     * @return ApiClientInterface
     */
    public function createClient(): ApiClientInterface
    {
        return new ApiClient(new ClientFactory($this->config));
    }
}
