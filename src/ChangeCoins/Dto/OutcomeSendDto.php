<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class OutcomeSendDto
{
    /**
     * @var string
     */
    private $externalId;

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
    private $callbackUrl;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @var UserDataDto
     */
    private $userdata;

    /**
     * @param string $externalId
     *
     * @return OutcomeSendDto
     */
    public function setExternalId(string $externalId): OutcomeSendDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param float $amount
     *
     * @return OutcomeSendDto
     */
    public function setAmount(float $amount): OutcomeSendDto
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param string $currency
     *
     * @return OutcomeSendDto
     */
    public function setCurrency(string $currency): OutcomeSendDto
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @param string $callbackUrl
     *
     * @return OutcomeSendDto
     */
    public function setCallbackUrl(string $callbackUrl): OutcomeSendDto
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return OutcomeSendDto
     */
    public function setNonce(int $nonce): OutcomeSendDto
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @param UserDataDto $userdata
     *
     * @return OutcomeSendDto
     */
    public function setUserdata(UserDataDto $userdata): OutcomeSendDto
    {
        $this->userdata = $userdata;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'externalid'   => $this->externalId,
            'amount'       => $this->amount,
            'currency'     => $this->currency,
            'userdata'     => $this->userdata->toArray(),
            'callback_url' => $this->callbackUrl,
            'nonce'        => $this->nonce,
        ];
    }
}
