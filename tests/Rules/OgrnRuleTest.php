<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OgrnRule;

class OgrnRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '1151232294620'],
        [false, '151232294621'],
    ];

    protected function getRule(): AbstractRule
    {
        return new OgrnRule();
    }
}
