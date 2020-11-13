<?php

namespace LootsIt\Address\Commands;

use Illuminate\Database\Console\Factories\FactoryMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class AddressFactoryMakeCommand extends FactoryMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:address-factory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new address model factory';

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if (!$this->option('model') || !$this->option('foreign_id') || !$this->option('foreign_class')) {
            $this->error('The options --model, --foreign_id and --foreign_class are mandatory');
        }

        parent::handle();
    }


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
        $stub = str_replace('{{ foreignId }}', $this->option('foreign_id'), $stub);
        return str_replace('{{ foreignClass }}', $this->option('foreign_class'), $stub);
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

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['model', 'm', InputOption::VALUE_REQUIRED, 'The name of the model'],
            ['foreign_class', null, InputOption::VALUE_REQUIRED, 'The foreign class for the address model'],
            ['foreign_id', null, InputOption::VALUE_REQUIRED, 'The foreign id in the address model'],
        ];
    }
}