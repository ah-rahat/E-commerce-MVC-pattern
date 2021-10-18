<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetalis extends Model
{
    public function orderinfo()
     {
        return $this->belongsTo('App\Order','order_id','id');
     }
}
