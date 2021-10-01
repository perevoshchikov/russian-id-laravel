<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\PersonInnRule;

class PersonInnRuleTest extends AbstractTestRule
{
    protected $values = ['500100732259'];

    protected function getRule(): AbstractRule
    {
        return new PersonInnRule();
    }
}
