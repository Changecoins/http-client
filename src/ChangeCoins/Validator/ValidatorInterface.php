<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Request\RequestInterface;

interface ValidatorInterface
{
    /**
     * @return bool
     */
    public function hasErrors(): bool;

    /**
     * @return string[]
     */
    public function getErrors(): array;

    /**
     * @param string $message
     */
    public function addError(string $message): void;

    /**
     * @param RequestInterface $request
     */
    public function validate(RequestInterface $request): void;
}
