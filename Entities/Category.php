<?php

namespace Modules\Iproduct\Entities;

use Astrotomic\Translatable\Translatable;
use Modules\Core\Icrud\Entities\CrudModel;

class Category extends CrudModel
{
  use Translatable;

  protected $table = 'iproduct__categories';
  public $transformer = 'Modules\Iproduct\Transformers\CategoryTransformer';
  public $repository = 'Modules\Iproduct\Repositories\CategoryRepository';
  public $requestValidation = [
      'create' => 'Modules\Iproduct\Http\Requests\CreateCategoryRequest',
      'update' => 'Modules\Iproduct\Http\Requests\UpdateCategoryRequest',
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
    'slug',
    'description'
  ];
  protected $fillable = [
    'parent_id',
    'options',
    'status'
  ];

  public function parent()
  {
    return $this->belongsTo(Category::class, 'parent_id');
  }
}
