<?php

namespace LootsIt\Address\Providers;

use Illuminate\Support\ServiceProvider;
use LootsIt\Address\Commands\AddressModelMakeCommand;

class AddressServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands(AddressModelMakeCommand::class);
    }
}