<?php

declare(strict_types=1);

namespace ChangeCoins\Storage;

use ChangeCoins\Validator\ValidatorInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ArrayStorageTest extends TestCase
{
    /**
     * @var ValidatorInterface|MockObject
     */
    private $validatorMock;

    protected function setUp(): void
    {
        $this->validatorMock = $this->getMockForAbstractClass(ValidatorInterface::class);
    }

    public function testStorage(): void
    {
        $urlName1   = 'url-name-1';
        $validator1 = clone $this->validatorMock;
        $urlName2   = 'url-name-2';
        $validator2 = clone $this->validatorMock;
        $urlName3   = 'url-name-3';
        $validator3 = clone $this->validatorMock;

        $storage = new ArrayStorage();
        $storage->add($urlName1, $validator1);
        $storage->add($urlName2, $validator2);
        $storage->add($urlName3, $validator3);

        $this->assertEquals(3, $storage->count());
        $this->assertTrue($storage->exists($urlName2));
        $this->assertFalse($storage->exists('url-name-random'));
        $this->assertEquals($validator1, $storage->get($urlName1));
        $this->assertNull($storage->get('url-name-random'));
    }
}
