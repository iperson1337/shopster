<?php

namespace Shopster;

use Illuminate\Support\Facades\Facade;

class ShopsterFacade extends Facade
{
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor()
  {
    return 'shopster';
  }
}