<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\KsRule;

class KsRuleTest extends AbstractAccountTestRule
{
    protected $values = [
        [true, '30101810500000000653', '044030653'],
        [false, '30101810500000000650', '044030653']
    ];

    protected function getRule(): AbstractRule
    {
        return new KsRule(static::BIK_ATTRIBUTE);
    }
}
