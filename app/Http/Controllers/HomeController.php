<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Categories;
use App\Models\ProductDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Categories::all();
        $mayLike = DB::table('products')->where('id', '<=', 10)->get();
        $trending = DB::table('products')->get();
        return view('home', compact('categories', 'mayLike', 'trending'));
    }
    public function indexProducts($id)
    {
        $products = DB::table('products')->where('category_id', $id)->get();
        return view('indexProduct', compact('products'));
    }
    public function contact()
    {
        return view('contact');
    }

}
