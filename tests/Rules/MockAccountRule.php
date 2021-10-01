<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractAccountRule;

class MockAccountRule extends AbstractAccountRule
{
    public function __construct(callable $validator)
    {
        parent::__construct('', $validator);
    }
}
