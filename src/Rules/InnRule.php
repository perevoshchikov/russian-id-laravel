<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class InnRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.inn.all', function ($value) {
            return Validator::isInn($value);
        });
    }
}
