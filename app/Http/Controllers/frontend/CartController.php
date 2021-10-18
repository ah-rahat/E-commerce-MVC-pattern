<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Cart;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
      $product=Product::find($request->pro_id);
      Cart::add([
        'id' => $product->id, // inique row ID
        'name' => $product->name,
        'price' =>$product->price,
        'quantity' => $request->product_quantity,
        'attributes' => [
            'product_image'=>$product->product_image,
            
        ]
      ]);
      return back();
    } 
    public function updateCart(Request $request)
    {
       
      
        Cart::update($request->pro_id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->product_quantity,
            ),
        ));
        return back();
    }
    public function deleteCart($pro_id)
    {
        
      Cart::remove($pro_id);
      return back();
    }
}
