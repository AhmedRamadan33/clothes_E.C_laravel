<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\ProductColor;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Gd\Driver;

class ProductController extends Controller
{

    // go to product page and display [Product data , Product category]
    public function index()
    {
        $products = DB::table('productsjoincategories')->get();
        return view('dashboard.Products.index', compact('products'));
    }

    //go to create product page
    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.Products.create', compact('categories'));
    }

    // store product in database
    public function store(Request $request)
    {
        //start validation code
        $request->validate([
            'name' => 'required|string|between:2,50',
            'parent_id' => 'required|exists:categories,id',
            'description' => 'required|string|between:2,150',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable',
            'discount_price' => 'required',
            'quantity' => 'required',


        ]);
        //End validation code

        $products = new Products();
        $products->name = $request->name;
        $products->category_id = $request->parent_id;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount_price = $request->discount_price;
        $products->quantity = $request->quantity;

        //start upload file code
        $file = $request->file('photo');
        $fileName = time() . $file->getClientOriginalName();
        $location = public_path('./files/');
        $file->move($location, $fileName);

        $products->image = $fileName;
        //End upload file code

        $products->save();

        return redirect()->back()->with('done', 'insert successfuly');
    }

    //go to Edit product page
    public function edit($id)
    {
        $products = DB::table('productsjoincategories')->where('id', $id)->first();
        return view('dashboard.Products.edit', compact('products'));
    }
    // update product in database
    public function update(Request $request, $id)
    {
        //start validation code
        $request->validate([
            'name' => 'required|string|between:2,50',
            'parent_id' => 'required|exists:categories,id',
            'description' => 'required|string|between:2,150',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'nullable',
            'discount_price' => 'required',
            'quantity' => 'required',
        ]);
        //End validation code
        $products = Products::find($id);
        $products->name = $request->name;
        $products->category_id = $request->parent_id;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->discount_price = $request->discount_price;
        $products->quantity = $request->quantity;

        //start upload file code
        $file = $request->file('photo');
        if ($file != null) {
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('./files/');
            $file->move($location, $fileName);
            $path = public_path('./files/') . $products->image;
            unlink($path);
        } else {
            $fileName = $products->image;
        }
        $products->image = $fileName;
        //End upload file code

        $products->save();
        return redirect()->route('products.index');
    }

    // delete product from database
    public function destroy($id)
    {
        $products = Products::find($id);
        $path = public_path('./files/') . $products->image;
        unlink($path);
        $products->delete();
        return redirect()->route('products.index');
    }
}
