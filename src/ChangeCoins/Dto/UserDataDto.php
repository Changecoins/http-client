<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class UserDataDto
{
    /**
     * @var string|null
     */
    private $payee;

    /**
     * @var string|null
     */
    private $memo;

    /**
     * @param string $payee
     *
     * @return UserDataDto
     */
    public function setPayee(string $payee): UserDataDto
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * @param string $memo
     *
     * @return UserDataDto
     */
    public function setMemo(string $memo): UserDataDto
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * @return (null|string)[]
     *
     * @psalm-return array{payee: null|string, memo: null|string}
     */
    public function toArray(): array
    {
        return [
            'payee' => $this->payee,
            'memo'  => $this->memo,
        ];
    }
}
