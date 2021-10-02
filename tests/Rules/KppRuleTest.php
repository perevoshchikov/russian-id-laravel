<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Rules\KppRule;

class KppRuleTest extends AbstractTestRule
{
    protected $values = [
        [true, '514944513'],
        [false, '0'],
    ];

    protected function getRule(): AbstractRule
    {
        return new KppRule();
    }
}
