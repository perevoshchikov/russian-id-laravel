<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OgrnOrOgrnipRule;

class OgrnipRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '315850060115169'],
        [false, '315850060115160'],
    ];

    protected function getRule(): AbstractRule
    {
        return new OgrnOrOgrnipRule();
    }
}
