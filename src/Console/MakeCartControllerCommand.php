<?php

namespace Shopster\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class MakeCartControllerCommand extends Command
{
  /**
   * The console command name.
   *
   * @var string
   */
  protected $name = 'shopster:cart-controller';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Create CartController.';

  /**
   * Suffix of the controller name.
   *
   * @var string
   */
  protected $controllerName = 'CartController';

  /**
   * Execute the console command.
   *
   * @return void
   */
  public function handle()
  {
    $this->line('');
    $this->info("Shopster CartController Creation.");
    $this->line('');

    $existingControllers = $this->alreadyExistingControllers();
    $defaultAnswer = true;

    if ($existingControllers) {
      $this->line('');

      $this->warn($this->getExistingControllersWarning($existingControllers));

      $defaultAnswer = false;
    }

    $this->line('');

    if (!$this->confirm("Proceed with the controller creation?", $defaultAnswer)) {
      return;
    }

    $this->line('');

    $this->line("Creating controller");

    if ($this->createController()) {
      $this->info("Controller created successfully.");
    } else {
      $this->error(
        "Couldn't create controller.\n" .
        "Check the write permissions within the Http/Controller directory."
      );
    }

    $this->line('');
  }

  /**
   * Create the controller.
   *
   * @return bool
   */
  protected function createController()
  {
    $controllerPath = $this->getControllerPath();

    $output = $this->laravel->view
      ->make('iperson1337/shopster::cart_controller')
      ->with(['shopster' => Config::get('shopster')])
      ->render();

    if (!file_exists($controllerPath) && $fs = fopen($controllerPath, 'x')) {
      fwrite($fs, $output);
      fclose($fs);
      return true;
    }

    return false;
  }

  /**
   * Build a warning regarding possible duplication
   * due to already existing Controller.
   *
   * @param array $existingControllers
   * @return string
   */
  protected function getExistingControllersWarning(array $existingControllers)
  {
    if (count($existingControllers) > 1) {
      $base = "Shopster Controller already exist.\nFollowing files were found: ";
    } else {
      $base = "Shopster controller already exists.\nFollowing file was found: ";
    }

    return $base . array_reduce($existingControllers, function ($carry, $fileName) {
        return $carry . "\n - " . $fileName;
      });
  }

  /**
   * Check if there is another controller
   * with the same suffix.
   *
   * @return array
   */
  protected function alreadyExistingControllers()
  {
    $matchingFiles = glob($this->getControllerPath());

    return array_map(function ($path) {
      return basename($path);
    }, $matchingFiles);
  }

  /**
   * Get the controller path.
   *
   * The date parameter is optional for ability
   * to provide a custom value or a wildcard.
   *
   * @return string
   */
  protected function getControllerPath()
  {
    return base_path("app/Http/Controllers/$this->controllerName.php");
  }
}
