<?php

declare(strict_types=1);

namespace ChangeCoins\Storage;

use ChangeCoins\Validator\ValidatorInterface;

interface StorageInterface
{
    /**
     * @param string             $name
     * @param ValidatorInterface $validator
     */
    public function add(string $name, ValidatorInterface $validator): void;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function exits(string $name): bool;

    /**
     * @param string $name
     *
     * @return ValidatorInterface|null
     */
    public function get(string $name): ?ValidatorInterface;
}
