<?php

namespace Modules\Iproduct\Repositories\Eloquent;

use Modules\Iproduct\Repositories\ProductRepository;
use Modules\Core\Icrud\Repositories\Eloquent\EloquentCrudRepository;

class EloquentProductRepository extends EloquentCrudRepository implements ProductRepository
{
  /**
   * Filter names to replace
   * @var array
   */
  protected $replaceFilters = [];

  /**
   * Relation names to replace
   * @var array
   */
  protected $replaceSyncModelRelations = [];

  /**
   * Attribute to define default relations
   * all apply to index and show
   * index apply in the getItemsBy
   * show apply in the getItem
   * @var array
   */
  protected $with = [/*all => [] ,index => [],show => []*/];

  /**
   * Filter query
   *
   * @param $query
   * @param $filter
   * @param $params
   * @return mixed
   */
  public function filterQuery($query, $filter, $params)
  {

    /**
     * Note: Add filter name to replaceFilters attribute before replace it
     *
     * Example filter Query
     * if (isset($filter->status)) $query->where('status', $filter->status);
     *
     */

    //Filter search
    if (isset($filter->search)) {
      $query->where(function ($query) use ($filter) {
        $query->whereHas('translations', function ($q) use ($filter) {
          $q->where('title', 'like', "%{$filter->search}%")
            ->orWhere('slug', 'like', '%' . $filter->search . '%');
        });
      })->orWhere('id', 'like', '%' . $filter->search . '%')
        ->orWhere('sku', 'like', '%' . $filter->search . '%')
        ->orWhere('reference', 'like', '%' . $filter->search . '%')
        ->orWhere('updated_at', 'like', '%' . $filter->search . '%')
        ->orWhere('created_at', 'like', '%' . $filter->search . '%');;
    }

    //Response
    return $query;
  }

  /**
   * Method to sync Model Relations
   *
   * @param $model ,$data
   * @return $model
   */
  public function syncModelRelations($model, $data)
  {
    //Get model relations data from attribute of model
    $modelRelationsData = ($model->modelRelations ?? []);

    /**
     * Note: Add relation name to replaceSyncModelRelations attribute before replace it
     *
     * Example to sync relations
     * if (array_key_exists(<relationName>, $data)){
     *    $model->setRelation(<relationName>, $model-><relationName>()->sync($data[<relationName>]));
     * }
     *
     */

    //Response
    return $model;
  }
}
