<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class DepositDto
{
    private const TYPE = 'deposit';

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
    private $callbackUrl;

    /**
     * @var int|null
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
            'currency'         => $this->currency,
            'currency_convert' => $this->currencyConvert,
            'limit_minute'     => $this->limitMinute,
            'callback_url'     => $this->callbackUrl,
            'nonce'            => $this->nonce,
            'type'             => self::TYPE,
        ];
    }
}
