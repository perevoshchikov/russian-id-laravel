<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Tests\TestCase;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;

abstract class AbstractTestRule extends TestCase
{
    /**
     * @var mixed[]
     */
    protected $values = [];

    /**
     * @return \Generator<mixed>
     */
    public function valuesProvider(): \Generator
    {
        foreach ($this->values as $value) {
            yield Arr::wrap($value);
        }
    }

    /**
     * @dataProvider valuesProvider
     * @param mixed $value
     */
    public function testValidate(bool $valid, $value): void
    {
        self::assertSame($valid, $this->getRule()->passes('value', $value));
    }

    public function testCustomMessage(): void
    {
        $rule = $this->getRule();
        $rule->setMessage('Use :attribute');
        $rule->passes('value', null);

        self::assertEquals('Use value', $rule->message());
    }

    public function testTranslateMessage(): void
    {
        $rule = $this->getRule();
        $rule->passes('value', null);

        $message = Lang::get($rule->getMessage(), [
            'attribute' => 'value'
        ]);

        self::assertNotEquals($message, $rule->getMessage());
        self::assertEquals($message, $rule->message());
    }

    abstract protected function getRule(): AbstractRule;
}
