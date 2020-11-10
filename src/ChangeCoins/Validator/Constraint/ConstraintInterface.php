<?php

declare(strict_types=1);

namespace ChangeCoins\Validator\Constraint;

use ChangeCoins\Validator\ValidatorInterface;

interface ConstraintInterface
{
    /**
     * @param array              $data
     * @param ValidatorInterface $validator
     */
    public function __invoke(array $data, ValidatorInterface $validator): void;
}
