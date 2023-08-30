<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // add to cart
    public function show($id)
    {
        $show = Products::find($id);
        $showDetails = ProductDetails::where('product_id', '=', $id)->get();
        return view('show', compact('show', 'showDetails'));
    }

    public function addToCart(Request $request, $id)
    {
        $aleardyInCart = Cart::where('prod_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists();
        if ($aleardyInCart) {
            return redirect()->back()->with('done', 'Aleardy Added to Cart');
        } else {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->prod_id = $id;
            $cart->prod_qty = $request->prod_qty;
            $cart->save();
            return redirect()->back()->with('done', 'Add to Cart successfully');
        }
    }

    public function cartCount(){
        $cartCount = Cart::where('user_id', '=', Auth::user()->id)->count();
        return response()->json(['count' => $cartCount]);
    }


    public function ViewCart()
    {
        $cart = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('allCart', compact('cart'));
    }
    public function editCart($id)
    {
        $editCart = Cart::find($id);
        return view('editCart', compact('editCart'));
    }
    public function updateCart(Request $request, $id){
        $updateCart = Cart::find($id);
        $updateCart->prod_qty = $request->prod_qty;
        $updateCart->save();
        return redirect()->route('ViewCart')->with('done', 'Update Cart successfully');
    }
    public function deleteCart($id){
        $deleteCart = Cart::find($id);
        $deleteCart->delete();
        return redirect()->route('ViewCart')->with('done', 'Delete Cart successfully');
    }


}
