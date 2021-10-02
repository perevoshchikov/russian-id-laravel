<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\LegalInnRule;

class LegalInnRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '7830002293'],
        [false, '7830002290'],
    ];

    protected function getRule(): AbstractRule
    {
        return new LegalInnRule();
    }
}
