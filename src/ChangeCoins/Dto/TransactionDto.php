<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class TransactionDto
{
    /**
     * @var string|null
     */
    private $externalId;

    /**
     * @var int|null
     */
    private $nonce;

    /**
     * @param string $externalId
     *
     * @return TransactionDto
     */
    public function setExternalId(string $externalId): TransactionDto
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @param int $nonce
     *
     * @return TransactionDto
     */
    public function setNonce(int $nonce): TransactionDto
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
