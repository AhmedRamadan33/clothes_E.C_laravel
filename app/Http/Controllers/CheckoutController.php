<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('checkout',compact('cart'));
    }

    //place Order
    public function placeOrder(Request $request){
        // validation code
        $request->validate([
            'phone' =>'required|numeric',
            'address' =>'required|string',
            'city' =>'required|string',
          'country' =>'required|string',
          'zip' =>'required|numeric',

        ]);
        
        $total = 0 ;
        $cartItems = Cart::where('user_id', '=', Auth::user()->id)->get();
        foreach($cartItems as $item){
            $total += $item->product->discount_price * $item->prod_qty ;
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->tracking_no = 'order'.rand(111,9999);
        $order->total_price = $total;
        $order->payment_mode = $request->payment_mode;
        $order->payment_id = $request->payment_id;
        $order->save();

        foreach($cartItems as $item){
            OrderDetails::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'prod_qty' => $item->prod_qty,
                'price' => $item->product->discount_price * $item->prod_qty,
            ]);
        }
        // user details
        if (Auth::user()->address == null){
            $user= User::where('id', '=', Auth::user()->id)->first();
            $user->phone = $request->phone ;
            $user->address = $request->address ;
            $user->city = $request->city ;
            $user->country = $request->country ;
            $user->zip = $request->zip ;
            $user->update();
        }
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        Cart::destroy($cart);

        if($request->payment_mode == "paid by razorpay"){
            return response()->json(['status' =>'Order Placed Successfully']);
        }
        return redirect()->route('home')->with('done', 'Order Placed Successfully');
    }

    // pay With Razorpay
    public function payWithRazorpay(Request $request){
        $total = 0 ;
        $cartItems = Cart::where('user_id', '=', Auth::user()->id)->get();
        foreach($cartItems as $item){
            $total += $item->product->discount_price * $item->prod_qty ;
        }
        $name = $request->name; 
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->address;
        $city = $request->city;
        $country = $request->country;
        $zip = $request->zip;
        
        return response()->json([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'city' => $city,
            'country' => $country,
            'zip' => $zip,
            'total' => $total,

        ]);
    }
    
    
}
