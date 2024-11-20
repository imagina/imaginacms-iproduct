<?php

namespace Modules\Iproduct\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
      'title',
      'description',
      'summary',
      'slug',
      'advanced_summary'

    ];
    protected $table = 'iproduct__product_translations';
}
