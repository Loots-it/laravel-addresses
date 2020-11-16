<?php

namespace LootsIt\Address\Commands;

use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;

class AddressMigrationCreator extends MigrationCreator
{

    protected string $foreignId;

    /**
     * Create a new migration creator instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $customStubPath
     * @return void
     */
    public function __construct(Filesystem $files, $customStubPath)
    {
        parent::__construct($files, $customStubPath);
    }

    /**
     * Get the path to the stubs.
     *
     * @return string
     */
    public function stubPath()
    {
        return __DIR__.'/stubs';
    }

    public function setForeignId(string $foreignId)
    {
        $this->foreignId = $foreignId;
    }

    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string  $name
     * @param  string  $stub
     * @param  string|null  $table
     * @return string
     */
    protected function populateStub($name, $stub, $table)
    {
        $stub = parent::populateStub($name, $stub, $table);
        return str_replace('{{ foreignId }}', $this->foreignId, $stub);
    }
}