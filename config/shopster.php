<?php

return [
  /*
  |--------------------------------------------------------------------------
  | Shopster Models
  |--------------------------------------------------------------------------
  |
  | These are the models used by Shopster to define the products.
  | If you want the Shopster models to be in a different namespace or
  | to have a different name, you can do it here.
  |
  */
  'models' => [
    'brand' => \App\Models\Brand::class,
    'product' => \App\Models\Product::class,
    'attribute_group' => \App\Models\AttributeGroup::class,
    'attribute' => \App\Models\Attribute::class,
    'attribute_value' => \App\Models\AttributeValue::class,
  ],
  /*
  |--------------------------------------------------------------------------
  | Shopster Tables
  |--------------------------------------------------------------------------
  |
  | These are the tables used by Shopster to store all the authorization data.
  |
  */
  'tables' => [
    'brands' => 'brands',
    'products' => 'products',
    'attribute_groups' => 'attribute_groups',
    'attributes' => 'attributes',
    'attribute_values' => 'attribute_values',
  ],
];
