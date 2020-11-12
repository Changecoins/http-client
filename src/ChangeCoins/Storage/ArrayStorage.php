<?php

declare(strict_types=1);

namespace ChangeCoins\Storage;

use ChangeCoins\Validator\ValidatorInterface;

class ArrayStorage implements StorageInterface, \Countable
{
    /**
     * @var ValidatorInterface[]
     */
    private $validatorList = [];

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->validatorList);
    }

    /**
     * @inheritDoc
     */
    public function add(string $name, ValidatorInterface $validator): void
    {
        $this->validatorList[$name] = $validator;
    }

    /**
     * @inheritDoc
     */
    public function exists(string $name): bool
    {
        return array_key_exists($name, $this->validatorList);
    }

    /**
     * @inheritDoc
     */
    public function get(string $name): ?ValidatorInterface
    {
        return $this->validatorList[$name] ?? null;
    }
}
