<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\InnRule;

class InnRuleTest extends AbstractTestRule
{
    protected $values = [
        '7830002293',
        '500100732259'
    ];

    protected function getRule(): AbstractRule
    {
        return new InnRule();
    }
}
