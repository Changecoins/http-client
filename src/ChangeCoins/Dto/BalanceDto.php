<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class BalanceDto
{
    /**
     * @var int|null
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
     * @return (int|null)[]
     *
     * @psalm-return array{nonce: int|null}
     */
    public function toArray(): array
    {
        return [
            'nonce' => $this->nonce,
        ];
    }
}
