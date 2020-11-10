<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositCreateDto;
use ChangeCoins\Dto\InvoiceCreateDto;
use ChangeCoins\Dto\InvoiceStatusDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Enum\Api;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;
use ChangeCoins\Request\HttpRequest;
use ChangeCoins\Request\Request;
use ChangeCoins\Request\ResponseInterface;

class ApiClient implements ApiClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig)
    {
        $this->client = (new ClientFactory($requestConfig))->create();
    }

    /**
     * @inheritDoc
     */
    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_BALANCE)
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function depositCreate(DepositCreateDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_DEPOSIT_CREATE)
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function moneySend(OutcomeSendDto $outcomeSendDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_OUTCOME_SEND)
            ->withBody($outcomeSendDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function invoiceCreate(InvoiceCreateDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_INVOICE_CREATE)
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function invoiceGetStatus(InvoiceStatusDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_INVOICE_STATUS)
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function transactionStatus(TransactionDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_TRANSACTION_STATUS)
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function getRates(): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withMethod(Request::METHOD_GET)
            ->withUrl(Api::URL_RATE);

        return $this->client->sendRequest($request);
    }
}
