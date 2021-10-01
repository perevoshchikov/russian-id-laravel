<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\LegalInnRule;

class LegalInnRuleTest extends AbstractTestRule
{
    protected $values = ['7830002293'];

    protected function getRule(): AbstractRule
    {
        return new LegalInnRule();
    }
}
