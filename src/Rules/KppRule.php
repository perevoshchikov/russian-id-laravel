<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class KppRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.kpp', function ($value) {
            return Validator::isKpp($value);
        });
    }
}
