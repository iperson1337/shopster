<?php


namespace Shopster\Console;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\GeneratorCommand;


class MakeAttributeValueCommand extends GeneratorCommand
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'shopster:attribute_value';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create AttributeValue model if it does not exist';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'AttributeValue model';

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return __DIR__ . '/../../stubs/attribute_value.stub';
  }

  /**
   * Get the desired class name from the input.
   *
   * @return string
   */
  protected function getNameInput()
  {
    return Config::get('shopster.models.attribute_value', 'AttributeValue');
  }

  /**
   * Get the default namespace for the class.
   *
   * @param string $rootNamespace
   * @return string
   */
  protected function getDefaultNamespace($rootNamespace)
  {
    return $rootNamespace.'\Models';
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
