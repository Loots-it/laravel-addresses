<?php

namespace LootsIt\Address\Providers;

use Illuminate\Support\ServiceProvider;
use LootsIt\Address\Commands\AddressModelMakeCommand;
use LootsIt\Address\Commands\AddressFactoryMakeCommand;

class AddressServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands(AddressModelMakeCommand::class);
        $this->commands(AddressFactoryMakeCommand::class);
    }
}