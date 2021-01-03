<?php

namespace Shopster\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class ShopsterAttributeGroup extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table;

  /**
   * Creates a new instance of the model.
   *
   * @param  array  $attributes
   * @return void
   */
  public function __construct(array $attributes = [])
  {
    parent::__construct($attributes);
    $this->table = Config::get('shopster.tables.attribute_groups');
  }
}
