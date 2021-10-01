<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class PersonInnRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.inn.person', function ($value) {
            return Validator::isPersonInn($value);
        });
    }
}
