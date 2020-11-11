<?php

declare(strict_types=1);

namespace Validator;

use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Validator\AbstractValidator;
use ChangeCoins\Validator\Constraint\NotEmpty;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class AbstractValidatorTest extends TestCase
{
    /**
     * @var RequestInterface|MockObject
     */
    private $requestMock;

    /**
     * @var AbstractValidator
     */
    private $validator;

    protected function setUp(): void
    {
        $this->requestMock = $this->getMockForAbstractClass(RequestInterface::class);

        $this->validator = new class extends AbstractValidator {
            /**
             * @inheritDoc
             */
            protected function getConstraints(): array
            {
                return [
                    new NotEmpty('test-attribute-name'),
                ];
            }
        };
    }

    public function testGetErrors(): void
    {
        $this->assertCount(0, $this->validator->getErrors());
        $this->assertFalse($this->validator->hasErrors());

        $this->validator->addError('Test first error message.');
        $this->validator->addError('Test second error message.');

        $this->assertCount(2, $this->validator->getErrors());
        $this->assertTrue($this->validator->hasErrors());
    }

    public function testValidate(): void
    {
        $this->requestMock
            ->method('getBody')
            ->willReturnOnConsecutiveCalls(
                [],
                ['test-attribute-name' => 'test data']
            );

        $this->validator->validate($this->requestMock);

        $this->assertTrue($this->validator->hasErrors());
        $this->assertCount(1, $this->validator->getErrors());
    }
}
