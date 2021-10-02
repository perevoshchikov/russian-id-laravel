<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OgrnOrOgrnipRule;

class OgrnOrOgrnipRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '1151232294620'],
        [true, '315850060115169'],
        [false, '315850060115160'],
    ];

    protected function getRule(): AbstractRule
    {
        return new OgrnOrOgrnipRule();
    }
}
