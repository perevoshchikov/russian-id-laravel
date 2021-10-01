<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\OmsRule;

class OmsRuleTest extends AbstractTestRule
{
    protected $values = ['2341998071655749'];

    protected function getRule(): AbstractRule
    {
        return new OmsRule();
    }
}
