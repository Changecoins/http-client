<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class BalanceDto
{
    /**
     * @var int
     */
    private $nonce;

    /**
     * @param int $nonce
     *
     * @return BalanceDto
     */
    public function setNonce(int $nonce): BalanceDto
    {
        $this->nonce = $nonce;

        return $this;
    }

    /**
     * @return int[]
     */
    public function toArray(): array
    {
        return [
            'nonce' => $this->nonce,
        ];
    }
}
