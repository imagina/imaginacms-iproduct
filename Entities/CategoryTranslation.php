<?php

namespace Modules\Iproduct\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'title',
      'slug',
      'description',
    ];
    protected $table = 'iproduct__category_translations';
}
