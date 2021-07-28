<?php

namespace ModelFilter\Console;

use Illuminate\Console\GeneratorCommand;

/**
 * @author Ali TOKMAKCI <alitokmakci@outlook.com>
 */

class MakeFilter extends GeneratorCommand
{
    protected $name = 'make:filter';

    protected $description = 'Create a new filter';

    protected $type = 'Filter';

    protected function getStub()
    {
        return __DIR__ . '/../stubs/filter.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Filters';
    }

    public function handle()
    {
        parent::handle();

        $this->createFilter();
    }

    protected function createFilter()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }
}
