<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Validator\Constraint\ConstraintInterface;
use ChangeCoins\Validator\Constraint\NotEmpty;

class OutcomeSendRequestValidator extends AbstractValidator
{
    /**
     * @return ConstraintInterface[]
     */
    protected function getConstraints(): array
    {
        return [
            new NotEmpty('externalid'),
            new NotEmpty('amount'),
            new NotEmpty('currency'),
            new NotEmpty('userdata'),
            new NotEmpty('nonce'),
        ];
    }
}
