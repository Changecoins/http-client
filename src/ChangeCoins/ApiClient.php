<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Dto\WithdrawalDto;
use ChangeCoins\Dto\RateDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Enum\Api;
use ChangeCoins\Factory\ClientFactoryInterface;
use ChangeCoins\Request\HttpRequest;
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
    public function createWithdrawal(WithdrawalDto $outcomeSendDto): ResponseInterface
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
    public function getRates(RateDto $rateDto): ResponseInterface
    {
        $request = new HttpRequest();
        $request
            ->withUrl(Api::URL_RATE)
            ->withBody($rateDto->toArray());

        return $this->client->sendRequest($request);
    }
}
