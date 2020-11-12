<?php

namespace LootsIt\Address\Providers;

use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([$this->getMigrationsPath() => database_path('migrations')], 'address-migrations');
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/../../database/migrations/';
    }
}