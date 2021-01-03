<?php


namespace Shopster\Console;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\GeneratorCommand;


class MakeAttributeCommand extends GeneratorCommand
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'shopster:attribute';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create Attribute model if it does not exist';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'Attribute model';

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return __DIR__ . '/../../stubs/attribute.stub';
  }

  /**
   * Get the desired class name from the input.
   *
   * @return string
   */
  protected function getNameInput()
  {
    return Config::get('shopster.models.attribute', 'Attribute');
  }

  /**
   * Get the default namespace for the class.
   *
   * @param string $rootNamespace
   * @return string
   */
  protected function getDefaultNamespace($rootNamespace)
  {
    return $rootNamespace;
  }

  /**
   * Get the console command arguments.
   *
   * @return array
   */
  protected function getArguments()
  {
    return [];
  }
}
