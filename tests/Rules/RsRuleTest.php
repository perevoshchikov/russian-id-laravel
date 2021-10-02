<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\RsRule;

class RsRuleTest extends AbstractAccountTestRule
{
    protected $values = [
        [true, '40702810955230165464', '044030653'],
        [false, '40702810955230165460', '044030653']
    ];

    protected function getRule(): AbstractRule
    {
        return new RsRule(static::BIK_ATTRIBUTE);
    }
}
