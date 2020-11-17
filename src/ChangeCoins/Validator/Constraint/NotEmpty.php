<?php

declare(strict_types=1);

namespace ChangeCoins\Validator\Constraint;

use ChangeCoins\Validator\ValidatorInterface;

class NotEmpty implements ConstraintInterface
{
    /**
     * @var string
     */
    private $attributeName;

    /**
     * @param string $attributeName
     */
    public function __construct(string $attributeName)
    {
        $this->attributeName = $attributeName;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(array $data, ValidatorInterface $validator): void
    {
        if (
            !array_key_exists($this->attributeName, $data) ||
            $data[$this->attributeName] === null ||
            (is_string($data[$this->attributeName]) && trim($data[$this->attributeName]) === '')
        ) {
            $validator->addError(sprintf('The "%s" parameter is required!', $this->attributeName));
        }
    }
}
