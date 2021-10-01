<?php

namespace Anper\RussianId\Laravel\Tests\Rules;

use Anper\RussianId\Laravel\Rules\AbstractRule;
use Anper\RussianId\Laravel\Tests\TestCase;
use Illuminate\Support\Facades\Lang;

abstract class AbstractTestRule extends TestCase
{
    /**
     * @var mixed[]
     */
    protected $values = [];

    /**
     * @var mixed[]
     */
    protected $invalids = [''];

    /**
     * @return \Generator<mixed>
     */
    public function valuesProvider(): \Generator
    {
        foreach ($this->values as $value) {
            yield [$value];
        }
    }

    /**
     * @return \Generator<mixed>
     */
    public function invalidsProvider(): \Generator
    {
        foreach ($this->invalids as $value) {
            yield [$value];
        }
    }

    /**
     * @dataProvider valuesProvider
     * @param mixed $value
     */
    public function testValidValue($value): void
    {
        self::assertTrue($this->getRule()->passes('test', $value));
    }

    /**
     * @dataProvider invalidsProvider
     * @param mixed $value
     */
    public function testInvalidValue($value): void
    {
        self::assertFalse($this->getRule()->passes('test', $value));
    }

    public function testCustomMessage(): void
    {
        $rule = $this->getRule();
        $rule->setMessage('Use :attribute');
        $rule->passes('test', null);

        self::assertEquals('Use test', $rule->message());
    }

    public function testTranslateMessage(): void
    {
        $rule = $this->getRule();
        $rule->passes('test', null);

        $message = Lang::get($rule->getMessage(), [
            'attribute' => 'test'
        ]);

        self::assertNotEquals($message, $rule->getMessage());
        self::assertEquals($message, $rule->message());
    }

    abstract protected function getRule(): AbstractRule;
}
