<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

class UserDataDto
{
    /**
     * @var string
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
     * @return string[]
     */
    public function ToArray(): array
    {
        return [
            'payee' => $this->payee,
        ];
    }
}
