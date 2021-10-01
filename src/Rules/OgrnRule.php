<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class OgrnRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.ogrn.legal', function ($value) {
            return Validator::isOgrn($value);
        });
    }
}
