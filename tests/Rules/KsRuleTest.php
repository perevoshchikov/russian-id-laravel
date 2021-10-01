<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\KsRule;
use Illuminate\Support\Facades\Validator;

class KsRuleTest extends AbstractTestRule
{
    protected function getRule(): AbstractRule
    {
        return new KsRule('bik');
    }

    public function testValidValue($value = null): void
    {
        $validator = Validator::make([
            'bik' => '044030653',
            'ks' => '30101810500000000653',
        ], [
            'bik' => 'required',
            'ks' => $this->getRule(),
        ]);

        self::assertFalse($validator->fails());
    }

    public function testInvalidValue($value = null): void
    {
        $validator = Validator::make([
            'bik' => '044030653',
            'ks' => '30101810500000000653',
        ], [
            'bik' => 'required',
            'ks' => $this->getRule(),
        ]);

        self::assertFalse($validator->fails());
    }
}
