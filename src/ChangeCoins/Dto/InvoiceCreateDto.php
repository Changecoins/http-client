<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class InvoiceCreateDto
{
    /**
     * @var string
     */
    private $externalId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $currencyConvert;

    /**
     * @var int
     */
    private $limitMinute;

    /**
     * @var string
     */
    private $returnUrl;

    /**
     * @var string
     */
    private $callbackUrl;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @param string $externalId
     *
     * @return InvoiceCreateDto
     */
    public function setExternalId(string $externalId): InvoiceCreateDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return InvoiceCreateDto
     */
    public function setTitle(string $title): InvoiceCreateDto
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return InvoiceCreateDto
     */
    public function setDescription(string $description): InvoiceCreateDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return InvoiceCreateDto
     */
    public function setAmount(float $amount): InvoiceCreateDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return InvoiceCreateDto
     */
    public function setCurrency(string $currency): InvoiceCreateDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $currencyConvert
     *
     * @return InvoiceCreateDto
     */
    public function setCurrencyConvert(string $currencyConvert): InvoiceCreateDto
    {
        $this->currencyConvert = $currencyConvert;

        return $this;
    }

    /**
     * @param int $limitMinute
     *
     * @return InvoiceCreateDto
     */
    public function setLimitMinute(int $limitMinute): InvoiceCreateDto
    {
        $this->limitMinute = $limitMinute;

        return $this;
    }

    /**
     * @param string $returnUrl
     *
     * @return InvoiceCreateDto
     */
    public function setReturnUrl(string $returnUrl): InvoiceCreateDto
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return InvoiceCreateDto
     */
    public function setCallbackUrl(string $callbackUrl): InvoiceCreateDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return InvoiceCreateDto
     */
    public function setNonce(int $nonce): InvoiceCreateDto
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'externalid'       => $this->externalId,
            'title'            => $this->title,
            'description'      => $this->description,
            'amount'           => $this->amount,
            'currency'         => $this->currency,
            'currency_convert' => $this->currencyConvert,
            'limit_minute'     => $this->limitMinute,
            'return_url'       => $this->returnUrl,
            'callback_url'     => $this->callbackUrl,
            'nonce'            => $this->nonce,
        ];
    }
}
