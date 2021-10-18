<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function custromer_name()
     {
        return $this->belongsTo('App\Checkout','custromer_id','id');
     }
     public function shippinginfo()
     {
        return $this->belongsTo('App\Shipping','shipping_id','id');
     }
     
}
