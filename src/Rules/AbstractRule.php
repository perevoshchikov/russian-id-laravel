<?php

namespace Anper\RussianId\Laravel\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

abstract class AbstractRule implements Rule
{
    /**
     * @var string
     */
    private $message;

    /**
     * @var mixed
     */
    private $attribute;

    /**
     * @var callable
     */
    private $validator;

    public function __construct(string $message, callable $validator)
    {
        $this->message = $message;
        $this->validator = static function ($value) use ($validator): bool {
            return $validator($value);
        };
    }

    final public function passes($attribute, $value): bool
    {
        $this->attribute = $attribute;

        return ($this->validator)($value);
    }

    final public function message(): string
    {
        return Lang::get($this->message, [
            'attribute' => $this->attribute,
        ]);
    }

    final public function getMessage(): string
    {
        return $this->message;
    }

    final public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}
