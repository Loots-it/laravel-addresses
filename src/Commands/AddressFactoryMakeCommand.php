<?php

use Illuminate\Database\Console\Factories\FactoryMakeCommand;

class AddressFactoryMakeCommand extends FactoryMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:address-factory {name} {model} {foreignId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new address model factory';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);
        return str_replace('{{ foreignId }}', $this->argument('foreignId'), $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/address-factory.stub';
    }
}