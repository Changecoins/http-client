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
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    /**
     * @var ClientInterface|MockObject
     */
    private $clientMock;

    /**
     * @var ResponseInterface|MockObject
     */
    private $responseMock;

    /**
     * @var BalanceDto|MockObject
     */
    private $balanceDtoMock;

    /**
     * @var DepositDto|MockObject
     */
    private $depositCreateDtoMock;

    /**
     * @var WithdrawalDto|MockObject
     */
    private $withdrawalDto;

    /**
     * @var InvoiceDto|MockObject
     */
    private $invoiceCreateDtoMock;

    /**
     * @var InvoiceDto|MockObject
     */
    private $invoiceStatusDtoMock;

    /**
     * @var TransactionDto|MockObject
     */
    private $transactionDtoMock;

    /**
     * @var RateDto|MockObject
     */
    private $rateDtoMock;

    /**
     * @var ApiClient
     */
    private $apiClient;

    protected function setUp(): void
    {
        $this->clientMock   = $this->getMockForAbstractClass(ClientInterface::class);
        $this->responseMock = $this->getMockForAbstractClass(ResponseInterface::class);

        $this->balanceDtoMock       = $this->getMockBuilder(BalanceDto::class)->getMock();
        $this->depositCreateDtoMock = $this->getMockBuilder(DepositDto::class)->getMock();
        $this->withdrawalDto        = $this->getMockBuilder(WithdrawalDto::class)->getMock();
        $this->invoiceCreateDtoMock = $this->getMockBuilder(InvoiceDto::class)->getMock();
        $this->invoiceStatusDtoMock = $this->getMockBuilder(InvoiceDto::class)->getMock();
        $this->transactionDtoMock   = $this->getMockBuilder(TransactionDto::class)->getMock();
        $this->rateDtoMock          = $this->getMockBuilder(RateDto::class)->getMock();

        $clientFactory = $this->getMockForAbstractClass(ClientFactoryInterface::class);
        $clientFactory->expects($this->once())
            ->method('create')
            ->willReturn($this->clientMock);

        $this->apiClient = new ApiClient($clientFactory);
    }

    public function testGetBalance(): void
    {
        $balanceData = [
            'nonce' => 123456,
        ];

        $this->balanceDtoMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($balanceData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_BALANCE)
            ->withBody($balanceData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->getBalance($this->balanceDtoMock)
        );
    }

    public function testDepositCreate(): void
    {
        $depositData = [
            'externalid' => 'some-id',
            'amount'     => 200.00,
            'currency'   => 'USD',
            'return_url' => 'https://test.url',
            'nonce'      => 12345,
        ];

        $this->depositCreateDtoMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($depositData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_DEPOSIT_CREATE)
            ->withBody($depositData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->depositCreate($this->depositCreateDtoMock)
        );
    }

    public function testCreateWithdrawal(): void
    {
        $outcomeSendData = [
            'externalid' => 'id',
            'currency'   => 'UAH'
        ];

        $this->withdrawalDto
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($outcomeSendData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_OUTCOME_SEND)
            ->withBody($outcomeSendData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->createWithdrawal($this->withdrawalDto)
        );
    }

    public function testInvoiceCreate(): void
    {
        $invoiceCreateData = [
            'externalid' => 'id',
            'currency'   => 'UAH'
        ];

        $this->invoiceCreateDtoMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($invoiceCreateData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_INVOICE_CREATE)
            ->withBody($invoiceCreateData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->invoiceCreate($this->invoiceCreateDtoMock)
        );
    }

    public function testTransactionStatus(): void
    {
        $transactionData = [
            'externalid' => 'some-id',
            'nonce'      => 12345,
        ];

        $this->transactionDtoMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($transactionData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_TRANSACTION_STATUS)
            ->withBody($transactionData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->transactionStatus($this->transactionDtoMock)
        );
    }

    public function testGetRates(): void
    {
        $rateData = [
            'nonce' => 12345,
        ];

        $this->rateDtoMock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn($rateData);

        $restRequest = new HttpRequest();
        $restRequest
            ->withUrl(Api::URL_RATE)
            ->withBody($rateData);

        $this->clientMock
            ->expects($this->once())
            ->method('sendRequest')
            ->with($this->equalTo($restRequest))
            ->willReturn($this->responseMock);

        $this->assertInstanceOf(
            ResponseInterface::class,
            $this->apiClient->getRates($this->rateDtoMock)
        );
    }
}
