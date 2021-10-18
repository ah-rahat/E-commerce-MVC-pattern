<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Cart;

class IndexController extends Controller
{
    public function index()
    {
        $latestproducts=Product::where('product_status','1')->orderBy('id','DESC')->take(5)->get();
        $categories=Category::where('category_status','1')->take(3)->get();
        $allProducts=Product::where('product_status','1')->get();
        return view('welcome',compact('latestproducts','categories','allProducts'));
    }
    public function productDetails($pro_id)
    {
        $productDetails=Product::where('id',$pro_id)->first();
      
       
        $relatedProducts=Product::where('category_id',$productDetails->category_id)->where('id','!=',$pro_id)->get();
        $otherProducts=Product::where('category_id','!=',$productDetails->category_id)->get();
       return view('frontendview/productdetails',compact('productDetails','relatedProducts','otherProducts'));
    }
    public function shopIndex($cat_id=null)
    {
        if ($cat_id){
            $allProducts=Product::where('product_status','1')->where('category_id',$cat_id)->get();
        }
        else{
            $allProducts=Product::where('product_status','1')->get();
        }
        $categories=Category::where('category_status','1')->get();
        return view('frontendview.shop',compact('categories','allProducts','cat_id'));
    }
   
}
