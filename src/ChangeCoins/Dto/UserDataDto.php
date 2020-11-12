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
     * @return (null|string)[]
     *
     * @psalm-return array{payee: null|string}
     */
    public function toArray(): array
    {
        return [
            'payee' => $this->payee,
        ];
    }
}
