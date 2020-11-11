<?php

declare(strict_types=1);

namespace Validator\Constraint;

use ChangeCoins\Validator\Constraint\NotEmpty;
use ChangeCoins\Validator\ValidatorInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class NotEmptyTest extends TestCase
{
    /**
     * @var ValidatorInterface|MockObject
     */
    private $validatorMock;

    protected function setUp(): void
    {
        $this->validatorMock = $this->getMockForAbstractClass(ValidatorInterface::class);
    }

    public function test__invoke(): void
    {
        $testAttributeName = 'test-name';

        $this->validatorMock
            ->expects($this->exactly(4))
            ->method('addError')
            ->with($this->equalTo(sprintf('The "%s" parameter is required!', $testAttributeName)));

        $constraint = new NotEmpty($testAttributeName);

        $constraint([], $this->validatorMock);
        $constraint([$testAttributeName => ''], $this->validatorMock);
        $constraint([$testAttributeName => '  '], $this->validatorMock);
        $constraint([$testAttributeName => null], $this->validatorMock);
    }
}
