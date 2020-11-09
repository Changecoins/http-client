<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\InvoiceCreateDto;
use ChangeCoins\Dto\InvoiceStatusDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\ClientFactoryInterface;
use ChangeCoins\Message\HttpRequest;
use ChangeCoins\Message\Request;
use ChangeCoins\Message\ResponseInterface;

class ApiClient implements ApiClientInterface
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @param ClientFactory $factory
     */
    public function __construct(ClientFactoryInterface $factory)
    {
        $this->client = $factory->create();
    }

    /**
     * @inheritDoc
     */
    public function getRates(): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withMethod(Request::METHOD_GET)
            ->withUrl('v2/rate');

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function moneySend(OutcomeSendDto $outcomeSendDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v2/outcome/send')
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
            ->withUrl('v2/invoice/create')
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
            ->withUrl('v2/invoice/status')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v2/balance')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    /**
     * @inheritDoc
     */
    public function transactionGetStatus(TransactionDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v2/transaction/status')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }
}
