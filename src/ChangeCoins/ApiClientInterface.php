<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\InvoiceCreateDto;
use ChangeCoins\Dto\InvoiceStatusDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Message\ResponseInterface;

interface ApiClientInterface
{
    /**
     * @param ClientFactory $factory
     */
    public function __construct(ClientFactory $factory);

    /**
     * @return ResponseInterface
     */
    public function getRates(): ResponseInterface;

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
     * @param BalanceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param TransactionDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function transactionGetStatus(TransactionDto $invoiceCreateDto): ResponseInterface;
}
