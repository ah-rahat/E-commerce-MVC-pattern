<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Checkout;
use Mail;
use Session;
use App\Shipping;
use App\Order;
use App\OrderDetalis;
use Cart;

use App\Mail\custromerRegistration;

class CheckoutController extends Controller
{
    public function index()
    {
       return view('frontendview.userform');
    }
    public function userStore(Request $request)
    {
        $email_check=Checkout::where('email_address','=',$request->email_address)->first();
        $phone_check_check=Checkout::where('phone_number','=',$request->phone_number)->first();
        if ($email_check || $phone_check_check) {
            if ($email_check) {
                return back()->with('error','email is already taken');
            }
            else{
                return back()->with('error','phone number is already taken');

            }
        }
        else{
       
        $userStore=new Checkout;
        $userStore->first_name=$request->first_name;
        $userStore->last_name=$request->last_name;
        $userStore->email_address=$request->email_address;
        $userStore->phone_number=$request->phone_number;
        $userStore->password=Hash::make($request->password);
        $userStore->address=$request->address;
        $userStore->save();
        Session::put(['custromer_id'=>$userStore->id]);
        Mail::to($userStore->email_address)->send(new custromerRegistration($userStore));
        
        return redirect('/shipping');
        }
        
    }
    public function shipping()
    {
     $custromerInfo=Checkout::find(Session::get('custromer_id'));
    
      return view('frontendview.shippingform',compact('custromerInfo'));
    }
    public function shippingStore(Request $request)
    {
        $shippingStore=new Shipping();
        $shippingStore->full_name=$request->full_name;
        $shippingStore->email_address=$request->email_address;
        $shippingStore->phone_no=$request->phone_number;
        $shippingStore->address=$request->address;
        $shippingStore->save();
        Session::put(['shipping_id'=>$shippingStore->id]);
        return redirect('/payment/info');
    }
    public function paymentInfo()
    {
        $shipping_info=Shipping::find(Session::get('shipping_id'));
        return view('frontendview.paymentInfo',compact('shipping_info'));
    }
    public function orderStore(Request $request)
    {
       if($request->payment_type == 'Cash'){
                $OrderStore=new Order();
                $OrderStore->custromer_id=Session::get('custromer_id');
                $OrderStore->shipping_id=Session::get('shipping_id');
                $OrderStore->grand_total=Session::get('total');
                $OrderStore->payment_type=$request->payment_type;
                $OrderStore->save();
                

                $cartCollection = Cart::getContent();
                foreach($cartCollection as $row){
                    $orderDetails=new OrderDetalis();
                    $orderDetails->order_id=$OrderStore->id;
                    $orderDetails->product_id=$row->id;
                    $orderDetails->product_name=$row->name;
                    $orderDetails->product_image=$row->attributes->product_image;
                    $orderDetails->product_price=$row->price;
                    $orderDetails->product_qty=$row->quantity;
                    $orderDetails->save();
                }
                Cart::clear();
                return redirect()->route('invoice.download',$OrderStore->id);
                
       }
    }
    public function eamilCheck(Request $request)
    {
        $email_check=Checkout::where('email_address',$request->email_address)->first();
        if ($email_check) {
            return 'Email Already Taken';
        }
        else{
            return 'Email Is Avaliable';
        }
       
    }
    public function phoneCheck(Request $request)
    {
        $phone_check=Checkout::where('phone_number',$request->phone_number)->first();  
        if (strlen($request->phone_number <1)) {
            return 'Enter A valid Number';
        }
        if (strlen($request->phone_number)<12) {
           
            if ($phone_check) {
                return 'Phone Number is Already Taken';
            }
            else{
                return 'Phone number Is Avaliable';
            }
        }
        else{
            return 'Phone Nummber must be less then 11 digits';
        }
       
       
    }
}
