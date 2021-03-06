<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Validator\Constraint\NotEmpty;

class TransactionRequestValidator extends AbstractValidator
{
    /**
     * @inheritDoc
     */
    protected function getConstraints(): array
    {
        return [
            new NotEmpty('externalid'),
            new NotEmpty('nonce'),
        ];
    }
}
