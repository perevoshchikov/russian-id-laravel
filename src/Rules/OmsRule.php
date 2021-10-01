<?php

namespace Anper\RussianId\Laravel\Rules;

use Anper\RussianId\Validator;

final class OmsRule extends AbstractRule
{
    public function __construct()
    {
        parent::__construct('russian-id::validation.oms', function ($value) {
            return Validator::isOms($value);
        });
    }
}
