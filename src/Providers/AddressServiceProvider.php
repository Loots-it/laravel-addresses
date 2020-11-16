<?php

namespace LootsIt\Address\Providers;

use Illuminate\Support\ServiceProvider;
use LootsIt\Address\Commands\AddressMigrateMakeCommand;
use LootsIt\Address\Commands\AddressMigrationCreator;
use LootsIt\Address\Commands\AddressModelMakeCommand;
use LootsIt\Address\Commands\AddressFactoryMakeCommand;

class AddressServiceProvider extends ServiceProvider
{
    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected array $commands = [
        AddressModelMakeCommand::class,
        AddressFactoryMakeCommand::class,
        AddressMigrateMakeCommand::class,
    ];


    public function register()
    {
        $this->registerCreator();
        $this->commands($this->commands);
    }

    /**
     * Register the migration creator.
     *
     * @return void
     */
    protected function registerCreator()
    {
        $this->app->bind(AddressMigrationCreator::class, function ($app) {
            return new AddressMigrationCreator($app['files'], $app->basePath('stubs'));
        });
    }
}