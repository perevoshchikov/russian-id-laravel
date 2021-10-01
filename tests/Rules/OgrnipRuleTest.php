<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OgrnOrOgrnipRule;

class OgrnipRuleTest extends AbstractTestRule
{
    protected $values = ['315850060115169'];

    protected function getRule(): AbstractRule
    {
        return new OgrnOrOgrnipRule();
    }
}
