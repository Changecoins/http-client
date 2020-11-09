<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\InvoiceCreateDto;
use ChangeCoins\Dto\InvoiceStatusDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Factory\ClientFactory;
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
    public function __construct(ClientFactory $factory)
    {
        $this->client = $factory->create();
    }

    /**
     * @return ResponseInterface
     */
    public function getRates(): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withMethod(Request::METHOD_GET)
            ->withUrl('v1/rate');

        return $this->client->sendRequest($request);
    }

    public function moneySend(OutcomeSendDto $outcomeSendDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v1/rate')
            ->withBody($outcomeSendDto->toArray());

        return $this->client->sendRequest($request);
    }

    public function invoiceCreate(InvoiceCreateDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v1/rate')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    public function invoiceGetStatus(InvoiceStatusDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v1/rate')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v1/rate')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }

    public function transactionGetStatus(TransactionDto $invoiceCreateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl('v1/rate')
            ->withBody($invoiceCreateDto->toArray());

        return $this->client->sendRequest($request);
    }
}

