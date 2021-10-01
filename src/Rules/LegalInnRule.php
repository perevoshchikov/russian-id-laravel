<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class LegalInnRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.inn.legal', function ($value) {
            return Validator::isLegalInn($value);
        });
    }
}
