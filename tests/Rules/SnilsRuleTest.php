<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\SnilsRule;

class SnilsRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '11223344595'],
        [false, '11223344590'],
    ];

    protected function getRule(): AbstractRule
    {
        return new SnilsRule();
    }
}
