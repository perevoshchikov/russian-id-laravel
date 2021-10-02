<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OmsRule;

class OmsRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '2341998071655749'],
        [false, '2341998071655740'],
    ];

    protected function getRule(): AbstractRule
    {
        return new OmsRule();
    }
}
