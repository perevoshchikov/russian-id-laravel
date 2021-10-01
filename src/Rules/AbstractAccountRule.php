<?php

namespace Anper\RussianId\Laravel\Rules;

use Illuminate\Contracts\Validation\ValidatorAwareRule;
use Illuminate\Support\Arr;
use Illuminate\Validation\Validator;

abstract class AbstractAccountRule extends AbstractRule implements ValidatorAwareRule
{
    /**
     * @var bool
     */
    private $skipValidationOnInvalidBik = true;

    /**
     * @var Validator|null
     */
    private $validator;

    /**
     * @var string
     */
    private $bikAttribute;

    public function __construct(string $message, callable $validator)
    {
        parent::__construct($message, function ($value) use ($validator) {
            return $this->hasInvalidBik() || $validator($this->getBik(), $value);
        });
    }

    /**
     * @param Validator $validator
     *
     * @return $this
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * @param bool $skipValidationOnInvalidBik
     *
     * @return $this
     */
    final public function skipValidationOnInvalidBik(bool $skipValidationOnInvalidBik)
    {
        $this->skipValidationOnInvalidBik = $skipValidationOnInvalidBik;

        return $this;
    }

    /**
     * @param string $bikAttribute
     *
     * @return $this
     */
    final public function setBikAttribute(string $bikAttribute)
    {
        $this->bikAttribute = $bikAttribute;

        return $this;
    }

    /**
     * @return mixed
     */
    private function getBik()
    {
        return $this->bikAttribute && $this->validator
            ? Arr::get($this->validator->getData(), $this->bikAttribute, '')
            : null;
    }

    private function hasInvalidBik(): bool
    {
        if (empty($this->bikAttribute) || empty($this->validator)) {
            return true;
        }

        return $this->skipValidationOnInvalidBik
            && Arr::has($this->validator->failed(), $this->bikAttribute);
    }
}
