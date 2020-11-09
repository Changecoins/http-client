<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class InvoiceStatusDto
{
    /**
     * @var string
     */
    private $externalId;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @param string $externalId
     *
     * @return InvoiceStatusDto
     */
    public function setExternalId(string $externalId): InvoiceStatusDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return InvoiceStatusDto
     */
    public function setNonce(int $nonce): InvoiceStatusDto
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
            'externalid' => $this->externalId,
            'nonce'      => $this->nonce,
        ];
    }
}
