<?php

namespace Anper\RussianId\Laravel;

use Illuminate\Support\ServiceProvider;

class RussianIdServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'russian-id');

        $this->publishes([
            __DIR__ . '/../resources/lang' => $this->app->resourcePath('lang/vendor/russian-id'),
        ]);
    }
}
