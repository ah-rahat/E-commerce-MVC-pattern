<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class ProductController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }
    public function index($pro_id=null)
    { 
       $categoryInfos=Category::select('id','category_name')->get();
       $productInfos=Product::all();
       return view('admin.product',compact('categoryInfos','productInfos','pro_id'));
    }
    public function store(Request $request)
    {
       $request->validate([
          'product_name'=>'required',
          'category_name'=>'required',
          'product_info'=>'required',
          'product_price'=>'required',
          'product_status'=>'required',
          'product_image'=>'required' 
       ]);
       $productStore=new Product();
       $productStore->name=$request->product_name;
       $productStore->category_id=$request->category_name;
       $productStore->price=$request->product_price;
       $productStore->product_info=$request->product_info;
       $productStore->product_status=$request->product_status;
       if ($request->hasFile('product_image')) {
         $filename=$request->product_image;
         $file_name=time().'.'.$filename->getClientOriginalExtension();
         echo $file_name;
         $filename->move(base_path('public/uploads/productImage/'),$file_name);
         $productStore->product_image=$file_name;
       }
       $productStore->save();
       return back();
    }
    public function update(Request $request)
    {
      
      
      $request->validate([
         'product_name_update'=>'required',
         'category_name_update'=>'required',
         'product_info_update'=>'required',
         
      ]);
      $productUpdate=Product::find($request->product_id);
      $productUpdate->name=$request->product_name_update;
      $productUpdate->category_id=$request->category_name_update;
      $productUpdate->price=$request->product_price_update;
      $productUpdate->product_info=$request->product_info_update;
      if ($request->hasFile('product_image_update')) {
         $filename=$request->product_image_update;
         $file_name=time().'.'.$filename->getClientOriginalExtension();
         $imagePath=base_path('public/uploads/productImage/'.$productUpdate->product_image);
         if (file_exists($imagePath)) {
            unlink($imagePath);
        }
         $filename->move(base_path('public/uploads/productImage/'),$file_name);
         $productUpdate->product_image=$file_name;
        
      }
      $productUpdate->update();
      return redirect('product');
      
    }
    
    public function status(Request $request,$pro_id,$pro_stats)
    {
      if($pro_stats == 0){
        
       $statUpdate=Product::find($pro_id);
       
        $statUpdate->product_status='1';
        $statUpdate->update();
      
      }
      else{
        $statUpdate=Product::find($pro_id);
        $statUpdate->product_status='0';
        $statUpdate->update();
      }
     return back();
    }
    public function delete($pro_id)
    {
      $productDelete=Product::find($pro_id);
      $imagePath=base_path('public/uploads/productImage/'.$productDelete->product_image);
      if (file_exists($imagePath)) {
         unlink($imagePath);
      }
      $productDelete->delete();
      return back();
    }
}
