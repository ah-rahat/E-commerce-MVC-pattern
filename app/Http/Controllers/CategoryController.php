<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Category;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index($cat_id=null)
    {
      $categoryInfos=Category::all();
       return view('admin/category',compact('categoryInfos','cat_id'));
    }
    public function store(Request $request)
    {
      $categoryStore=new Category();
      $categoryStore->category_name=$request->category;
      $categoryStore->category_description=$request->description;
      $categoryStore->save();
      return back();
       
    }

    public function update(Request $request)
    {
     $categoryUpdate=Category::find($request->catId);
     
     $categoryUpdate->category_name=$request->edit_category;
     $categoryUpdate->category_description=$request->edit_description;
     $categoryUpdate->update();
    return redirect('category');
    }
    public function delete($cat_id)
    {
      $categoryDelete=Category::find($cat_id);
      $categoryDelete->delete();
      return back();
    }

    public function status(Request $request,$cat_id,$cat_stats)
    {
      if($cat_stats == 0){
        
       $statUpdate=Category::find($cat_id);
       
        $statUpdate->category_status='1';
        $statUpdate->update();
      
      }
      else{
        $statUpdate=Category::find($cat_id);
        $statUpdate->category_status='0';
        $statUpdate->update();
      }
     return back();
    }
}
