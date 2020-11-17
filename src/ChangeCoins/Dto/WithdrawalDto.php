<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class WithdrawalDto
{
    /**
     * @var string|null
     */
    private $externalId;

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
    private $callbackUrl;

    /**
     * @var int|null
     */
    private $nonce;

    /**
     * @var UserDataDto|null
     */
    private $userdata;

    /**
     * @param string $externalId
     *
     * @return WithdrawalDto
     */
    public function setExternalId(string $externalId): WithdrawalDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return WithdrawalDto
     */
    public function setAmount(float $amount): WithdrawalDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return WithdrawalDto
     */
    public function setCurrency(string $currency): WithdrawalDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return WithdrawalDto
     */
    public function setCallbackUrl(string $callbackUrl): WithdrawalDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return WithdrawalDto
     */
    public function setNonce(int $nonce): WithdrawalDto
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @param UserDataDto $userdata
     *
     * @return WithdrawalDto
     */
    public function setUserdata(UserDataDto $userdata): WithdrawalDto
    {
        $this->userdata = $userdata;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'externalid'   => $this->externalId,
            'amount'       => $this->amount,
            'currency'     => $this->currency,
            'userdata'     => $this->userdata ? $this->userdata->toArray() : null,
            'callback_url' => $this->callbackUrl,
            'nonce'        => $this->nonce,
        ];
    }
}
