<?php

namespace Shopster\Console;

use Illuminate\Support\Facades\Config;
use Illuminate\Console\GeneratorCommand;

class MakeAttributeGroupCommand extends GeneratorCommand
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'shopster:attribute_group';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create AttributeGroup model if it does not exist';

  /**
   * The type of class being generated.
   *
   * @var string
   */
  protected $type = 'AttributeGroup model';

  /**
   * Get the stub file for the generator.
   *
   * @return string
   */
  protected function getStub()
  {
    return __DIR__ . '/../../stubs/attribute_group.stub';
  }

  /**
   * Get the desired class name from the input.
   *
   * @return string
   */
  protected function getNameInput()
  {
    return Config::get('shopster.models.attribute_group', 'AttributeGroup');
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
