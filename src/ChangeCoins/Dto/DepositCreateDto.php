<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class DepositCreateDto
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
     * @return DepositCreateDto
     */
    public function setExternalId(string $externalId): DepositCreateDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return DepositCreateDto
     */
    public function setTitle(string $title): DepositCreateDto
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return DepositCreateDto
     */
    public function setDescription(string $description): DepositCreateDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return DepositCreateDto
     */
    public function setAmount(float $amount): DepositCreateDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return DepositCreateDto
     */
    public function setCurrency(string $currency): DepositCreateDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $currencyConvert
     *
     * @return DepositCreateDto
     */
    public function setCurrencyConvert(string $currencyConvert): DepositCreateDto
    {
        $this->currencyConvert = $currencyConvert;

        return $this;
    }

    /**
     * @param int $limitMinute
     *
     * @return DepositCreateDto
     */
    public function setLimitMinute(int $limitMinute): DepositCreateDto
    {
        $this->limitMinute = $limitMinute;

        return $this;
    }

    /**
     * @param string $returnUrl
     *
     * @return DepositCreateDto
     */
    public function setReturnUrl(string $returnUrl): DepositCreateDto
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return DepositCreateDto
     */
    public function setCallbackUrl(string $callbackUrl): DepositCreateDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return DepositCreateDto
     */
    public function setNonce(int $nonce): DepositCreateDto
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
