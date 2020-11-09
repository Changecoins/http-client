<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use ChangeCoins\ClientInterface;

interface ClientFactoryInterface
{
    /**
     * @return ClientInterface
     */
    public function create(): ClientInterface;
}
