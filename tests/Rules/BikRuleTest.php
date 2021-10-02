<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\BikRule;

class BikRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '044525225'],
        [false, '0'],
    ];

    protected function getRule(): AbstractRule
    {
        return new BikRule();
    }
}
