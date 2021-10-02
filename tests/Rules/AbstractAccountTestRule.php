<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractAccountRule;
use Illuminate\Support\Facades\Validator;

abstract class AbstractAccountTestRule extends AbstractTestRule
{
    public const BIK_ATTRIBUTE = 'bik';

    /**
     * @dataProvider valuesProvider
     * @param mixed $value
     * @param mixed $bik
     */
    public function testValidate(bool $valid, $value, $bik = null): void
    {
        $validator = Validator::make([
            static::BIK_ATTRIBUTE => $bik,
            'value' => $value,
        ], [
            static::BIK_ATTRIBUTE => 'required',
            'value' => $this->getPreparedRule(),
        ]);

        self::assertNotSame($valid, $validator->fails());
    }

    public function skipProvider(): array
    {
        return [
            [true],
            [false]
        ];
    }

    /**
     * @dataProvider skipProvider
     * @param bool $skip
     */
    public function testSkipValidation(bool $skip): void
    {
        $rule = $this->getPreparedRule();
        $rule->skipValidationOnInvalidBik($skip);

        $validator = Validator::make([
            static::BIK_ATTRIBUTE => null,
            'value' => '1',
        ], [
            static::BIK_ATTRIBUTE  => 'required',
            'value' => $rule,
        ]);

        self::assertTrue($validator->fails());

        $errors = $validator->errors();

        self::assertTrue($errors->has(static::BIK_ATTRIBUTE));
        self::assertNotSame($skip, $errors->has('value'));
    }

    /**
     * @dataProvider valuesProvider
     * @param mixed $value
     * @param mixed $bik
     */
    public function testValidateWithNestedData(bool $valid, $value, $bik = null): void
    {
        $rule = $this->getPreparedRule();
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

        self::assertNotSame($valid, $validator->fails());
    }

    private function getPreparedRule(): AbstractAccountRule
    {
        /** @var AbstractAccountRule $rule */
        $rule = $this->getRule();

        self::assertInstanceOf(AbstractAccountRule::class, $rule);

        $rule->setBikAttribute(static::BIK_ATTRIBUTE);

        return $rule;
    }
}
