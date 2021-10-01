<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class BikRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.bik', function ($value) {
            return Validator::isBik($value);
        });
    }
}
