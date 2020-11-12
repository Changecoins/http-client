<?php

declare(strict_types=1);

namespace Validator\Constraint;

use ChangeCoins\Validator\Constraint\Url;
use ChangeCoins\Validator\ValidatorInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class UrlTest extends TestCase
{
    /**
     * @var ValidatorInterface|MockObject
     */
    private $validatorMock;

    protected function setUp(): void
    {
        $this->validatorMock = $this->getMockForAbstractClass(ValidatorInterface::class);
    }

    public function testMagicMethod(): void
    {
        $testAttributeName = 'test-name';

        $this->validatorMock
            ->expects($this->exactly(4))
            ->method('addError')
            ->with($this->equalTo(sprintf('The "%s" parameter is not a valid url!', $testAttributeName)));

        $constraint = new Url($testAttributeName);

        $constraint([], $this->validatorMock);
        $constraint([$testAttributeName => ''], $this->validatorMock);
        $constraint([$testAttributeName => '  '], $this->validatorMock);
        $constraint([$testAttributeName => null], $this->validatorMock);
        $constraint([$testAttributeName => 'http://test.io'], $this->validatorMock);
    }
}
