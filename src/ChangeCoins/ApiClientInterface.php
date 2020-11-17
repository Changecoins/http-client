<?php

declare(strict_types=1);

namespace ChangeCoins;

use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Dto\WithdrawalDto;
use ChangeCoins\Dto\RateDto;
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
     * @param WithdrawalDto $outcomeSendDto
     *
     * @return ResponseInterface
     */
    public function createWithdrawal(WithdrawalDto $outcomeSendDto): ResponseInterface;

    /**
     * @param InvoiceDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function invoiceCreate(InvoiceDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param TransactionDto $invoiceCreateDto
     *
     * @return ResponseInterface
     */
    public function transactionStatus(TransactionDto $invoiceCreateDto): ResponseInterface;

    /**
     * @param RateDto $rateDto
     *
     * @return ResponseInterface
     */
    public function getRates(RateDto $rateDto): ResponseInterface;
}
