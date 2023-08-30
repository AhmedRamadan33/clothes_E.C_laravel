<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $order = Order::where('user_id', '=',Auth::user()->id)->get();
        return view('orders',compact('order'));
    }
    public function show($id){
        $order = OrderDetails::where('order_id','=',$id)->get();
        return view('showOrders',compact('order'));
    }
    public function destroy($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }
    
}
