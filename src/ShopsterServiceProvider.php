<?php

namespace Shopster;

use Illuminate\Support\ServiceProvider;

class ShopsterServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any package services.
   *
   * @return void
   */
  public function boot()
  {
    $this->publishConfiguration();
    $this->publishMigrations();
  }

  /**
   * Publish the configuration.
   *
   * @return void
   */
  protected function publishConfiguration()
  {
    $this->publishes([
        __DIR__ . '/../config/shopster.php' => config_path('shopster.php'),
    ]);
  }

  /**
   * Publish package's migrations.
   *
   * @return void
   */
  public function publishMigrations()
  {
    $timestamp = date('Y_m_d_His', time());
    $stub = __DIR__.'/../database/migrations/create_shopster_tables.php';
    $target = $this->app->databasePath().'/migrations/'.$timestamp.'_create_shopster_tables.php';

    $this->publishes([$stub => $target], 'shopster.migrations');
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->configure();
    $this->registerShopster();
    $this->registerCommands();
  }

  /**
   * Setup the configuration for Shopster.
   *
   * @return void
   */
  protected function configure()
  {
    $this->mergeConfigFrom(__DIR__ . '/../config/shopster.php', 'shopster');
  }

  /**
   * Register the application bindings.
   *
   * @return void
   */
  protected function registerShopster()
  {
    $this->app->bind('shopster', function ($app) {
      return new Shopster($app);
    });

    $this->app->alias('shopster', 'Shopster\Shopster');
  }

  /**
   * Register the Laratrusts commands.
   *
   * @return void
   */
  protected function registerCommands()
  {
    if ($this->app->runningInConsole()) {
      $this->commands([
        Console\SetupCommand::class,
        Console\MakeProductCommand::class,
        Console\MakeAttributeGroupCommand::class,
        Console\MakeAttributeCommand::class,
        Console\MakeAttributeValueCommand::class,
      ]);
    }
  }
}
