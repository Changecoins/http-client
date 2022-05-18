<?php

declare(strict_types=1);

namespace ChangeCoins\Dto;

use PHPUnit\Framework\TestCase;

class UserDataDtoTest extends TestCase
{
    public function testToArray(): void
    {
        $testPayee   = 'test-payee';
        $testMemo    = '456';
        $firstName   = 'Foo';
        $lastName    = 'Boo';
        $email       = 'foo@test.com';
        $phone       = null;
        $address     = null;
        $bankId      = null;
        $bankName    = null;
        $description = null;

        $userDataDto = (new UserDataDto())
            ->setPayee($testPayee)
            ->setMemo($testMemo)
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setPhone($phone)
            ->setAddress($address)
            ->setBankId($bankId)
            ->setBankName($bankName)
            ->setDescription($description);

        $this->assertEquals(
            [
                'payee'           => $testPayee,
                'memo'            => $testMemo,
                'first_name'      => $firstName,
                'last_name'       => $lastName,
                'phone'           => $phone,
                'email'           => $email,
                'customerAddress' => $address,
                'bankId'          => $bankId,
                'bankName'        => $bankName,
                'description'     => $description,
            ],
            $userDataDto->toArray()
        );
    }
}
