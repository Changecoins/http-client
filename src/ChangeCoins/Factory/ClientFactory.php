<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use ChangeCoins\ClientInterface;
use ChangeCoins\Enum\Api;
use ChangeCoins\Handler\RequestHandler;
use ChangeCoins\Handler\ResponseHandler;
use ChangeCoins\Middleware\Request\RequestValidatorMiddleware;
use ChangeCoins\Middleware\Request\SignerMiddleware;
use ChangeCoins\Middleware\Response\ValidationErrorMiddleware;
use ChangeCoins\MiddlewareClient;
use ChangeCoins\Storage\ArrayStorage;
use ChangeCoins\Storage\StorageInterface;
use ChangeCoins\Transport\CurlTransport;
use ChangeCoins\Validator\BalanceReuestValidator;
use ChangeCoins\Validator\DepositCreateRequestValidator;
use ChangeCoins\Validator\InvoiceCreateRequestValidator;
use ChangeCoins\Validator\InvoiceStatusRequestValidator;
use ChangeCoins\Validator\OutcomeSendRequestValidator;
use ChangeCoins\Validator\TransactionRequestValidator;

final class ClientFactory implements ClientFactoryInterface
{
    /**
     * @var RequestConfig
     */
    private $requestConfig;

    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig)
    {
        $this->requestConfig = $requestConfig;
    }

    /**
     * @inheritDoc
     */
    public function create(): ClientInterface
    {

        return new MiddlewareClient(
            new CurlTransport($this->requestConfig),
            new RequestHandler([
                new RequestValidatorMiddleware($this->createValidatorStorage()),
                new SignerMiddleware(
                    $this->requestConfig->getSecretKey(),
                    $this->requestConfig->getPublicKey()
                ),
            ]),
            new ResponseHandler([
                new ValidationErrorMiddleware(),
            ])
        );
    }

    /**
     * @return StorageInterface
     */
    private function createValidatorStorage(): StorageInterface
    {
        $validatorStorage = new ArrayStorage();
        $validatorStorage->add(Api::URL_BALANCE, new BalanceReuestValidator());
        $validatorStorage->add(Api::URL_DEPOSIT_CREATE, new DepositCreateRequestValidator());
        $validatorStorage->add(Api::URL_INVOICE_CREATE, new InvoiceCreateRequestValidator());
        $validatorStorage->add(Api::URL_INVOICE_STATUS, new InvoiceStatusRequestValidator());
        $validatorStorage->add(Api::URL_OUTCOME_SEND, new OutcomeSendRequestValidator());
        $validatorStorage->add(Api::URL_TRANSACTION_STATUS, new TransactionRequestValidator());

        return $validatorStorage;
    }
}
