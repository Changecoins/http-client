<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class DepositDto
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
     * @return DepositDto
     */
    public function setExternalId(string $externalId): DepositDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return DepositDto
     */
    public function setTitle(string $title): DepositDto
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return DepositDto
     */
    public function setDescription(string $description): DepositDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return DepositDto
     */
    public function setAmount(float $amount): DepositDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return DepositDto
     */
    public function setCurrency(string $currency): DepositDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $currencyConvert
     *
     * @return DepositDto
     */
    public function setCurrencyConvert(string $currencyConvert): DepositDto
    {
        $this->currencyConvert = $currencyConvert;

        return $this;
    }

    /**
     * @param int $limitMinute
     *
     * @return DepositDto
     */
    public function setLimitMinute(int $limitMinute): DepositDto
    {
        $this->limitMinute = $limitMinute;

        return $this;
    }

    /**
     * @param string $returnUrl
     *
     * @return DepositDto
     */
    public function setReturnUrl(string $returnUrl): DepositDto
    {
        $this->returnUrl = $returnUrl;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return DepositDto
     */
    public function setCallbackUrl(string $callbackUrl): DepositDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return DepositDto
     */
    public function setNonce(int $nonce): DepositDto
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
