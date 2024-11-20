<?php

namespace Modules\Iproduct\Repositories\Cache;

use Modules\Iproduct\Repositories\ProductRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheProductDecorator extends BaseCacheCrudDecorator implements ProductRepository
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->entityName = 'iproduct.products';
        $this->repository = $product;
    }
}
