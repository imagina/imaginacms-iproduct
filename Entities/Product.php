<?php

namespace Modules\Iproduct\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Product extends CrudModel
{
  use Translatable;

  static $dynamicTraits = ['Modules\Iprice\Traits\HasPrices'];
  protected $table = 'iproduct__products';
  public $transformer = 'Modules\Iproduct\Transformers\ProductTransformer';
  public $repository = 'Modules\Iproduct\Repositories\ProductRepository';
  public $requestValidation = [
      'create' => 'Modules\Iproduct\Http\Requests\CreateProductRequest',
      'update' => 'Modules\Iproduct\Http\Requests\UpdateProductRequest',
    ];
  //Instance external/internal events to dispatch with extraData
  public $dispatchesEventsWithBindings = [
    //eg. ['path' => 'path/module/event', 'extraData' => [/*...optional*/]]
    'created' => [],
    'creating' => [],
    'updated' => [],
    'updating' => [],
    'deleting' => [],
    'deleted' => []
  ];
  public $translatedAttributes = [
    'title',
    'description',
    'summary',
    'slug',
    'advanced_summary'
  ];
  protected $fillable = [
    'options',
    'status',
    'category_id',
    'sku',
    'reference',
    'featured',
    'is_internal'
  ];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
}
