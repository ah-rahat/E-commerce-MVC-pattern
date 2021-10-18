<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Checkout;
use Hash;

class CustromerController extends Controller
{
    public function custromerLogout()
    {
        Session::forget(['custromer_id', 'shipping_id']);
        return redirect('/');
    }
    public function userlogin(Request $request)
    {
       $cheakCustromer=Checkout::where('email_address',$request->email_address)->first();
       if ($cheakCustromer) {
        if (password_verify($request->password,$cheakCustromer->password)) {
            Session::put(['custromer_id'=>$cheakCustromer->id]);
            return redirect('/shipping');
        }
        
        else{
            return back()->with('password_faild','Invalid Password');
        }
       }
       else{
           return back()->with('login_faild','Invalid Email');
       }
    }
}
