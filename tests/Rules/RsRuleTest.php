<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\RsRule;
use Illuminate\Support\Facades\Validator;

class RsRuleTest extends AbstractTestRule
{
    protected function getRule(): AbstractRule
    {
        return new RsRule('bik');
    }

    public function testValidValue($value = null): void
    {
        $validator = Validator::make([
            'bik' => '044030653',
            'rs' => '40702810955230165464',
        ], [
            'bik' => 'required',
            'rs' => $this->getRule(),
        ]);

        self::assertFalse($validator->fails());
    }

    public function testInvalidValue($value = null): void
    {
        $validator = Validator::make([
            'bik' => '044030653',
            'rs' => '40702810955230165460',
        ], [
            'bik' => 'required',
            'rs' => $this->getRule(),
        ]);

        self::assertTrue($validator->fails());
    }
}
