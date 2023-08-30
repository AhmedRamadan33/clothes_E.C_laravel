<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ProductDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
    //go to create product Details page
    public function create()
    {
        $product = Products::all();
        return view('dashboard.Products.addDetails', compact('product'));
    }

    // store product Details in database
    public function store(Request $request)
    {
        //start validation code
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string|between:1,20',
            'color' => 'required|string|between:1,20',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //End validation code

        $productDetails = new ProductDetails();
        $productDetails->product_id = $request->product_id;
        $productDetails->size = $request->size;
        $productDetails->color = $request->color;

        // upload file : name,location
        // $file = $request->file('photo');
        // $fileName = time() . $file->getClientOriginalName();
        // $location = public_path('./files/');
        // $file->move($location, $fileName);

        // $productDetails->image = $fileName;
        //End upload file code 
        $productDetails->save();
        return redirect()->back()->with('done', 'insert successfuly');
    }

    // Display the specified resource.
    public function show($id)
    {
        $productDetails = DB::table('product_details')->where('product_id', $id)->get();
        return view('dashboard.Products.show', compact('productDetails'));
    }

    // go to edit product details page
    public function edit($id)
    {
        $productDetails = DB::table('product_details_with_name')->where('id', $id)->first();
        return view('dashboard.Products.editDetails', compact('productDetails'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        //start validation code
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string|between:1,20',
            'color' => 'required|string|between:1,20',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //End validation code
        $productDetails = ProductDetails::find($id);

        $productDetails->product_id = $request->product_id;
        $productDetails->size = $request->size;
        $productDetails->color = $request->color;

        // upload file : name,location
        // $file = $request->file('photo');
        // if ($file != null) {
        //     $fileName = time() . $file->getClientOriginalName();
        //     $location = public_path('./files/');
        //     $file->move($location, $fileName);
        //     $path = public_path('./files/') . $productDetails->image;
        //     unlink($path);
        // } else {
        //     $fileName = $productDetails->image;
        // }
        // $productDetails->image = $fileName;
        //End upload file code 
        $productDetails->save();
        return redirect()->route('products.index');
    }


    // Remove the specified resource from storage.

    public function destroy($id)
    {
        $productDetails = ProductDetails::find($id);
        // $path = public_path('./files/') . $productDetails->image;
        // unlink($path);
        $productDetails->delete();
        return redirect()->route('products.index');
    }
}
