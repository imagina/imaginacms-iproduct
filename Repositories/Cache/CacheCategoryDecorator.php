<?php

namespace Modules\Iproduct\Repositories\Cache;

use Modules\Iproduct\Repositories\CategoryRepository;
use Modules\Core\Icrud\Repositories\Cache\BaseCacheCrudDecorator;

class CacheCategoryDecorator extends BaseCacheCrudDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'iproduct.categories';
        $this->repository = $category;
    }
}
