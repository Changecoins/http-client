<?php

declare(strict_types=1);

namespace ChangeCoins\Enum;

class Api
{
    public const URL_BALANCE            = 'balance';
    public const URL_DEPOSIT_CREATE     = 'deposit/create';
    public const URL_INVOICE_CREATE     = 'invoice/create';
    public const URL_INVOICE_STATUS     = 'invoice/status';
    public const URL_OUTCOME_SEND       = 'outcome/send';
    public const URL_TRANSACTION_STATUS = 'transaction/status';
    public const URL_RATE               = 'rate';
}
