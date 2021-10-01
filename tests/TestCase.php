<?php

namespace Anper\RussianId\Laravel\Tests;

use Anper\RussianId\Laravel\RussianIdServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            RussianIdServiceProvider::class,
        ];
    }
}
