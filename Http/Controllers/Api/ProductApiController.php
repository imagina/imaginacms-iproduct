<?php

namespace Modules\Iproduct\Http\Controllers\Api;

use Modules\Core\Icrud\Controllers\BaseCrudController;
//Model
use Modules\Iproduct\Entities\Product;
use Modules\Iproduct\Repositories\ProductRepository;

class ProductApiController extends BaseCrudController
{
  public $model;
  public $modelRepository;

  public function __construct(Product $model, ProductRepository $modelRepository)
  {
    $this->model = $model;
    $this->modelRepository = $modelRepository;
  }
}
