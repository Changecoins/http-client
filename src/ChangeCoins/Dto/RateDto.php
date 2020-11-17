<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class RateDto
{
    /**
     * @var string|null
     */
    private $currencyFrom;

    /**
     * @var string|null
     */
    private $currencyTo;

    /**
     * @var int|null
     */
    private $nonce;

    /**
     * @param string $currencyFrom
     *
     * @return RateDto
     */
    public function setCurrencyFrom(string $currencyFrom): RateDto
    {
        $this->currencyFrom = $currencyFrom;

        return $this;
    }

    /**
     * @param string $currencyTo
     *
     * @return RateDto
     */
    public function setCurrencyTo(string $currencyTo): RateDto
    {
        $this->currencyTo = $currencyTo;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return RateDto
     */
    public function setNonce(int $nonce): RateDto
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
            'currencyFrom' => $this->currencyFrom,
            'currencyTo'   => $this->currencyTo,
            'nonce'        => $this->nonce,
        ];
    }
}
