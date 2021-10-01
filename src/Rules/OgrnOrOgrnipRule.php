<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class OgrnOrOgrnipRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.ogrn.all', function ($value) {
            return Validator::isOgrnOrOgrnip($value);
        });
    }
}
