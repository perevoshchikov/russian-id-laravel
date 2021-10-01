<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OgrnRule;

class OgrnRuleTest extends AbstractTestRule
{
    protected $values = ['1151232294620'];

    protected function getRule(): AbstractRule
    {
        return new OgrnRule();
    }
}
