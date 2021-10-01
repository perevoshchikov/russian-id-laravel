<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class SnilsRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.snils', function ($value) {
            return Validator::isSnils($value);
        });
    }
}
