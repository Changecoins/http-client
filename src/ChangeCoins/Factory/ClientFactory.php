<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

use ChangeCoins\ClientInterface;
use ChangeCoins\Enum\Api;
use ChangeCoins\Handler\RequestHandler;
use ChangeCoins\Handler\ResponseHandler;
use ChangeCoins\Middleware\Request\RequestValidatorMiddleware;
use ChangeCoins\Middleware\Request\RequestSignerMiddleware;
use ChangeCoins\Middleware\Response\ResponseValidationMiddleware;
use ChangeCoins\MiddlewareClient;
use ChangeCoins\Storage\ArrayStorage;
use ChangeCoins\Storage\StorageInterface;
use ChangeCoins\Transport\CurlTransport;
use ChangeCoins\Validator\BalanceRequestValidator;
use ChangeCoins\Validator\DepositCreateRequestValidator;
use ChangeCoins\Validator\InvoiceCreateRequestValidator;
use ChangeCoins\Validator\OutcomeSendRequestValidator;
use ChangeCoins\Validator\TransactionRequestValidator;

class ClientFactory implements ClientFactoryInterface
{
    /**
     * @var RequestConfigInterface
     */
    private $requestConfig;

    /**
     * @param RequestConfigInterface $requestConfig
     */
    public function __construct(RequestConfigInterface $requestConfig)
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
                new RequestSignerMiddleware(
                    $this->requestConfig->getPublicKey(),
                    $this->requestConfig->getSecretKey()
                ),
            ]),
            new ResponseHandler([
                new ResponseValidationMiddleware(),
            ])
        );
    }

    /**
     * @return StorageInterface
     */
    private function createValidatorStorage(): StorageInterface
    {
        $validatorStorage = new ArrayStorage();
        $validatorStorage->add(Api::URL_BALANCE, new BalanceRequestValidator());
        $validatorStorage->add(Api::URL_DEPOSIT_CREATE, new DepositCreateRequestValidator());
        $validatorStorage->add(Api::URL_INVOICE_CREATE, new InvoiceCreateRequestValidator());
        $validatorStorage->add(Api::URL_OUTCOME_SEND, new OutcomeSendRequestValidator());
        $validatorStorage->add(Api::URL_TRANSACTION_STATUS, new TransactionRequestValidator());

        return $validatorStorage;
    }
}
