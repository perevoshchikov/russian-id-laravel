<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class KsRule extends AbstractAccountRule
{
    public function __construct(string $bikAttribute)
    {
        parent::__construct('russian-id::validation.ks', function ($bik, $value) {
            return Validator::isKs($bik, $value);
        });

        $this->setBikAttribute($bikAttribute);
    }
}
