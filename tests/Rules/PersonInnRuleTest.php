<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\PersonInnRule;

class PersonInnRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '500100732259'],
        [false, '500100732250'],
    ];

    protected function getRule(): AbstractRule
    {
        return new PersonInnRule();
    }
}
