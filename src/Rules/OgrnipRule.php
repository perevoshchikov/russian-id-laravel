<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class OgrnipRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.ogrn.ip', function ($value) {
            return Validator::isOgrnip($value);
        });
    }
}
