<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractAccountRule;
use Anper\RussianId\Laravel\Tests\MockInvoke;
use Anper\RussianId\Laravel\Tests\TestCase;
use Illuminate\Support\Facades\Validator;

class AbstractAccountRuleTest extends TestCase
{
    public function testRunValidatorWhenBikIsValid(): void
    {
        $bik   = '1';
        $value = '1';

        $mock = $this->createMock(MockInvoke::class);
        $mock->expects(self::once())
            ->method('__invoke')
            ->willReturn(true)
            ->with($bik, $value);

        $rule = $this->createRule($mock);
        $rule->setBikAttribute('bik');

        $validator = Validator::make([
            'bik'  => $bik,
            'test' => $value,
        ], [
            'bik'  => 'required',
            'test' => $rule,
        ]);

        self::assertFalse($validator->fails());
    }

    public function testSkipValidationWhenBikIsInvalid(): void
    {
        $mock = $this->createMock(MockInvoke::class);
        $mock->expects(self::never())
            ->method('__invoke');

        $rule = $this->createRule($mock);
        $rule->setBikAttribute('bik');
        $rule->skipValidationOnInvalidBik(true);

        $validator = Validator::make([
            'bik'  => null,
            'test' => '1',
        ], [
            'bik'  => 'required',
            'test' => $rule,
        ]);

        self::assertTrue($validator->fails());
    }

    public function testRunValidatorWhenBikIsInvalid(): void
    {
        $bik   = null;
        $value = '1';

        $mock = $this->createMock(MockInvoke::class);
        $mock->expects(self::once())
            ->method('__invoke')
            ->with($bik, $value);

        $rule = $this->createRule($mock);
        $rule->setBikAttribute('bik');
        $rule->skipValidationOnInvalidBik(false);

        $validator = Validator::make([
            'bik'  => $bik,
            'test' => $value,
        ], [
            'bik'  => 'required',
            'test' => $rule,
        ]);

        self::assertTrue($validator->fails());
    }

    public function testRunValidatorWithNestedDataWhenBikIsValid(): void
    {
        $bik   = '1';
        $value = '1';

        $mock = $this->createMock(MockInvoke::class);
        $mock->expects(self::once())
            ->method('__invoke')
            ->willReturn(true)
            ->with($bik, $value);

        $rule = $this->createRule($mock);
        $rule->setBikAttribute('test.bik');

        $validator = Validator::make([
            'test' => [
                'bik'   => $bik,
                'value' => $value,
            ]
        ], [
            'test.bik'   => 'required',
            'test.value' => $rule,
        ]);

        self::assertFalse($validator->fails());
    }

    private function createRule(callable $validator): AbstractAccountRule
    {
        return new class ($validator) extends AbstractAccountRule {
            public function __construct(callable $validator)
            {
                parent::__construct('', $validator);
            }
        };
    }
}
