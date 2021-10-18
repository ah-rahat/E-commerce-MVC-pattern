<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{
    protected $table = 'products';
     public function category()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
