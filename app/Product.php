<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category_name()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
