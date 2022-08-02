<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class InvoiceDto
{
    private const TYPE = 'invoice';

    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var float|null
     */
    private $amount;

    /**
     * @var string|null
     */
    private $currency;

    /**
     * @var string|null
     */
    private $currencyConvert;

    /**
     * @var int|null
     */
    private $limitMinute;

    /**
     * @var string|null
     */
    private $returnUrl;

    /**
     * @var string|null
     */
    private $callbackUrl;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var int|null
     */
    private $nonce;

    /**
     * @var string|null
     */
    private $cardholderName = null;

    /**
     * @param string $externalId
     *
     * @return InvoiceDto
     */
    public function setExternalId(string $externalId): InvoiceDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return InvoiceDto
     */
    public function setTitle(string $title): InvoiceDto
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return InvoiceDto
     */
    public function setDescription(string $description): InvoiceDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return InvoiceDto
     */
    public function setAmount(float $amount): InvoiceDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return InvoiceDto
     */
    public function setCurrency(string $currency): InvoiceDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $currencyConvert
     *
     * @return InvoiceDto
     */
    public function setCurrencyConvert(string $currencyConvert): InvoiceDto
    {
        $this->currencyConvert = $currencyConvert;

        return $this;
    }

    /**
     * @param int $limitMinute
     *
     * @return InvoiceDto
     */
    public function setLimitMinute(int $limitMinute): InvoiceDto
    {
        $this->limitMinute = $limitMinute;

        return $this;
    }

    /**
     * @param string $returnUrl
     *
     * @return InvoiceDto
     */
    public function setReturnUrl(string $returnUrl): InvoiceDto
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return InvoiceDto
     */
    public function setCallbackUrl(string $callbackUrl): InvoiceDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param string $email
     *
     * @return InvoiceDto
     */
    public function setEmail(string $email): InvoiceDto
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return InvoiceDto
     */
    public function setNonce(int $nonce): InvoiceDto
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @param string|null $cardholderName
     *
     * @return InvoiceDto
     */
    public function setCardholderName(?string $cardholderName = null): InvoiceDto
    {
        $this->cardholderName = $cardholderName;

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
            'email'            => $this->email,
            'nonce'            => $this->nonce,
            'type'             => self::TYPE,
            'cardholder_name'  => $this->cardholderName,
        ];
    }
}
