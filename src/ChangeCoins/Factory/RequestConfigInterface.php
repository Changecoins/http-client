<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

interface RequestConfigInterface
{
    /**
     * @return string
     */
    public function getPublicKey(): string;

    /**
     * @return string
     */
    public function getSecretKey(): string;

    /**
     * @return array
     */
    public function getOptions(): array;
}
