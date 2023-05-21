<?php

namespace FilippoToso\Alleantia\Laravel;

use FilippoToso\Alleantia\Alleantia;
use FilippoToso\Alleantia\Options;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Alleantia::class, function () {
            $options = new Options([
                'base_url' => config('services.alleantia.base_url'),
                'username' => config('services.alleantia.username'),
                'password' => config('services.alleantia.password'),
            ]);

            return new Alleantia($options);
        });
    }
}
