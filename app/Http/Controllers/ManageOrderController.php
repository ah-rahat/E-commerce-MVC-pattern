<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetalis;
use Cart;
use PDF;

class ManageOrderController extends Controller
{
    public function index()
    {
        $orderInfos=Order::all();
        return view('admin.orderview',compact('orderInfos'));
    }
    public function orderDetails($order_id)
    {
        $orderInfos=Order::find($order_id);
        $orderedProducts=OrderDetalis::where('order_id',$order_id)->get();
       return view('admin.orderDetails',compact('orderInfos','orderedProducts'));
    }
    public function orderInvoice($order_id)
    {
        $orderInfos=Order::find($order_id);
        $orderedProducts=OrderDetalis::where('order_id',$order_id)->get();
       return view('admin.orderinvoice',compact('orderInfos','orderedProducts'));
    }
    public function orderInvoicedownload($order_id)
    {
        $orderInfos=Order::find($order_id);
        $orderedProducts=OrderDetalis::where('order_id',$order_id)->get();
        $pdf = PDF::loadView('admin.orderinvoicedownload',compact('orderInfos','orderedProducts'));
        Cart::clear();
        return $pdf->download('invoice'.$order_id.'.'.'pdf');
    }
    
    
}
