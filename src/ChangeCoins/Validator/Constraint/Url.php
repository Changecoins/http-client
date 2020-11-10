<?php

declare(strict_types=1);

namespace ChangeCoins\Validator\Constraint;

use ChangeCoins\Validator\ValidatorInterface;

class Url implements ConstraintInterface
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
            $data[$this->attributeName] === '' ||
            filter_input($data[$this->attributeName], FILTER_VALIDATE_URL)
        ) {
            $validator->addError(sprintf('The "%s" parameter is not a valid url!', $this->attributeName));
        }
    }
}
