<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Validator\Constraint\NotEmpty;

class BalanceRequestValidator extends AbstractValidator
{
    /**
     * @inheritDoc
     */
    protected function getConstraints(): array
    {
        return [
            new NotEmpty('nonce'),
        ];
    }
}
