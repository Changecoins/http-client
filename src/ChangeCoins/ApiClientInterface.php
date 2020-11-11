<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Factory\ClientFactoryInterface;
use ChangeCoins\Request\ResponseInterface;

interface ApiClientInterface
{
    /**
     * @param ClientFactoryInterface $clientFactory
     */
    public function __construct(ClientFactoryInterface $clientFactory);

    /**
     * @param BalanceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function getBalance(BalanceDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param DepositDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function depositCreate(DepositDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param OutcomeSendDto $outcomeSendDto
     *
     * @return ResponseInterface
     */
    public function moneySend(OutcomeSendDto $outcomeSendDto): ResponseInterface;

    /**
     * @param InvoiceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function invoiceCreate(InvoiceDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param InvoiceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function invoiceStatus(InvoiceDto $invoiceCreateDto): ResponseInterface;

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
