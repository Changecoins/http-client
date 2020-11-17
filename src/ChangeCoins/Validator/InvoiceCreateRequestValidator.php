<?php

declare(strict_types=1);

namespace ChangeCoins\Validator;

use ChangeCoins\Validator\Constraint\NotEmpty;
use ChangeCoins\Validator\Constraint\Url;

class InvoiceCreateRequestValidator extends AbstractValidator
{
    /**
     * @inheritDoc
     */
    protected function getConstraints(): array
    {
        return [
            new NotEmpty('externalid'),
            new NotEmpty('amount'),
            new NotEmpty('currency'),
            new NotEmpty('nonce'),
            new Url('return_url'),
        ];
    }
}
