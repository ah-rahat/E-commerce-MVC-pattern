<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product_name()
    {
        return $this->belongsTo('App\Product','id','category_id');
    }
}
