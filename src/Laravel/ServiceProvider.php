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
                'apiKey' => config('services.openai.api_key'),
                'oprganizationId' => config('services.openai.oprganization_id'),
            ]);

            return new Alleantia($options);
        });
    }
}
