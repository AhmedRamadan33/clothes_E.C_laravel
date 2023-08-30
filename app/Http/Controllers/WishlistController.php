<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::all();
        return view('wishlist',compact('wishlist'));
    }

    // add a wishlist item to the wishlist table 
    public function addToWishlist($id)
    {
        $aleardyInwishlist = Wishlist::where('prod_id', '=', $id)->where('user_id', '=', Auth::user()->id)->exists();
        if ($aleardyInwishlist) {
            return redirect()->back()->with('done', 'Aleardy Added to wishlist');
        } else {
            $wishlist = new Wishlist();
            $wishlist->user_id = Auth::user()->id;
            $wishlist->prod_id = $id;
            $wishlist->save();
            return redirect()->back()->with('done', 'Add to wishlist successfully');
        }           
    }
    // delete a wishlist item from the wishlist table
    public function deleteWishlist($id){
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('done', 'Delete from wishlist successfully');
    }

    public function wishlistCount(){
        $wishlistCount = Wishlist::where('user_id', '=', Auth::user()->id)->count();
        return response()->json(['count' => $wishlistCount]);
    }
}
