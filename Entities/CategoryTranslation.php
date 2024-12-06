<?php

namespace Modules\Iproduct\Entities;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryTranslation extends Model
{
  use Sluggable;

  public $timestamps = false;
  protected $fillable = [
    'title',
    'slug',
    'description',
  ];
  protected $table = 'iproduct__category_translations';

  public function sluggable() : Array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }
}
