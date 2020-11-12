<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Enum\Api;
use ChangeCoins\Factory\ClientFactoryInterface;
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
     * @param ClientFactoryInterface $clientFactory
     */
    public function __construct(ClientFactoryInterface $clientFactory)
    {
        $this->client = $clientFactory->create();
    }

    /**
     * @inheritDoc
     */
    public function getBalance(BalanceDto $balanceDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_BALANCE)
            ->withBody($balanceDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function depositCreate(DepositDto $depositCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_DEPOSIT_CREATE)
            ->withBody($depositCreateDto->toArray());

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
    public function invoiceCreate(InvoiceDto $invoiceCreateDto): ResponseInterface
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
    public function invoiceStatus(InvoiceDto $invoiceStatusDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_INVOICE_STATUS)
            ->withBody($invoiceStatusDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function transactionStatus(TransactionDto $transactionDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_TRANSACTION_STATUS)
            ->withBody($transactionDto->toArray());

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
