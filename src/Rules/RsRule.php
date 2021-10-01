<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class RsRule extends AbstractAccountRule
{
    public function __construct(string $bikAttribute)
    {
        parent::__construct('russian-id::validation.rs', function ($bik, $value) {
            return Validator::isRs($bik, $value);
        });

        $this->setBikAttribute($bikAttribute);
    }
}
