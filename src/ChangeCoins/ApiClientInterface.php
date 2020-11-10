<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositCreateDto;
use ChangeCoins\Dto\InvoiceCreateDto;
use ChangeCoins\Dto\InvoiceStatusDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Factory\RequestConfig;
use ChangeCoins\Request\ResponseInterface;

interface ApiClientInterface
{
    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig);

    /**
     * @param BalanceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param DepositCreateDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function depositCreate(DepositCreateDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param OutcomeSendDto $outcomeSendDto
     *
     * @return ResponseInterface
     */
    public function moneySend(OutcomeSendDto $outcomeSendDto): ResponseInterface;

    /**
     * @param InvoiceCreateDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function invoiceCreate(InvoiceCreateDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param InvoiceStatusDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function invoiceGetStatus(InvoiceStatusDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param TransactionDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function transactionStatus(TransactionDto $invoiceCreateDto): ResponseInterface;

    /**
     * @return ResponseInterface
     */
    public function getRates(): ResponseInterface;
}
