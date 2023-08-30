<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('status','=','0')->get();
        return view('dashboard.Orders.index',compact('orders'));
    }

    public function show($id)
    {
        $orders = OrderDetails::where('order_id','=',$id)->first();
        $orderDetails = OrderDetails::where('order_id','=',$id)->get();

        return view('dashboard.Orders.view', compact('orders','orderDetails'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->order_status;
        $order->save();
        return redirect()->route('order.index')->with('done', 'Status Order Updated successfully');
    }
    public function historyOrders(){
        $orders = Order::where('status','=','1')->get();
        return view('dashboard.Orders.historyOrders',compact('orders'));
    }
}
