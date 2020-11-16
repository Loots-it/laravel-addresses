<?php

namespace LootsIt\Address\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Support\Composer;

class AddressMigrateMakeCommand extends MigrateMakeCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'make:address-migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}
        {--foreign_id= : The foreign id the new table should reference}';


    /**
     * The migration creator instance.
     *
     * @var \LootsIt\Address\Commands\AddressMigrationCreator
     */
    protected $creator;

    /**
     * Create a new migration install command instance.
     *
     * @param  \LootsIt\Address\Commands\AddressMigrationCreator  $creator
     * @param  \Illuminate\Support\Composer  $composer
     * @return void
     */
    public function __construct(AddressMigrationCreator $creator, Composer $composer)
    {
        parent::__construct($creator, $composer);
    }

    public function handle()
    {
        $this->creator->setForeignId($this->input->getOption('foreign_id'));
        parent::handle();
    }
}