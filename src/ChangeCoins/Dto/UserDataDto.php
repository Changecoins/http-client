<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use function Sodium\add;

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
     * @var string|null
     */
    private $firstName;

    /**
     * @var string|null
     */
    private $lastName;

    /**
     * @var string|null
     */
    private $phone;

    /**
     * @var string|null
     */
    private $email;

    /**
     * @var string|null
     */
    private $address;

    /**
     * @var string|null
     */
    private $bankId;

    /**
     * @var string|null
     */
    private $bankName;

    /**
     * @param string $payee
     *
     * @return UserDataDto
     */
    public function setPayee(?string $payee): self
    {
        $this->payee = $payee;

        return $this;
    }

    /**
     * @param string $memo
     *
     * @return UserDataDto
     */
    public function setMemo(?string $memo): self
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string|null $address
     */
    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @param string|null $bankId
     */
    public function setBankId(?string $bankId): self
    {
        $this->bankId = $bankId;

        return $this;
    }

    /**
     * @param string|null $bankName
     */
    public function setBankName(?string $bankName): self
    {
        $this->bankName = $bankName;

        return $this;
    }

    /**
     * @return (null|string)[]
     *
     * @psalm-return array{
     *     payee: null|string,
     *     memo: null|string,
     *     first_name: null|string,
     *     last_name: null|string,
     *     phone: null|string,
     *     email: null|string,
     *     customerAddress: null|string,
     *     bankId: null|string,
     *     bankName: null|string,
     * }
     */
    public function toArray(): array
    {
        return [
            'payee'           => $this->payee,
            'memo'            => $this->memo,
            'first_name'      => $this->firstName,
            'last_name'       => $this->lastName,
            'phone'           => $this->phone,
            'email'           => $this->email,
            'customerAddress' => $this->address,
            'bankId'          => $this->bankId,
            'bankName'        => $this->bankName,
        ];
    }
}
