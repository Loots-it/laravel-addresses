<?php

namespace LootsIt\Address\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class AddressModelMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:address-model {name} {foreign_class} {foreign_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent address model class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';


    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        parent::handle();
        $this->createFactory();
        $this->createMigration();
    }

    /**
     * Create a model factory for the model.
     *
     * @return void
     */
    protected function createFactory()
    {
        $factory = Str::studly($this->argument('name'));

        $this->call("make:address-factory", [
            'name' => "{$factory}Factory",
            '--model' => $this->qualifyClass($this->getNameInput()),
            '--foreign_class' => $this->argument('foreign_class'),
            '--foreign_id' => $this->argument('foreign_id'),
        ]);
    }

    /**
     * Create a migration file for the model.
     *
     * @return void
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        $this->call('make:address-migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--foreign_id' => $this->argument('foreign_id'),
        ]);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/address-model.stub';
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
        return str_replace('{{ foreignId }}', $this->argument('foreign_id'), $stub);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return is_dir(app_path('Models')) ? $rootNamespace.'\\Models' : $rootNamespace;
    }
}