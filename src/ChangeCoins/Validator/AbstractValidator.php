<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Validator\Constraint\ConstraintInterface;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * @var string[]
     */
    private $errors = [];

    /**
     * @inheritDoc
     */
    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    /**
     * @inheritDoc
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @inheritDoc
     */
    public function addError(string $message): void
    {
        $this->errors[] = $message;
    }

    /**
     * @inheritDoc
     */
    public function validate(RequestInterface $request): void
    {
        $requestData = $request->getBody();

        foreach ($this->getConstraints() as $constraint) {
            $constraint($requestData, $this);
        }
    }

    /**
     * @return ConstraintInterface[]
     */
    abstract protected function getConstraints(): array;
}
