<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class OutcomeSendDto
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
