<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Categories;

class CategoryController extends Controller
{
    // go to List categories page and display all data
    public function index()
    {
        $categories = Categories::all();
        $Choosecategories = Categories::where('parent_id', null)->get();

        return view('dashboard.Categories.index', compact('categories','Choosecategories'));
    }
    // go to create categories page and display Categories by parent_id only (main category)
    public function create()
    {
        $categories = Categories::where('parent_id', null)->get();
        return view('dashboard.Categories.create', compact('categories'));
    }
    // store in database
    public function store(StoreRequest $request)
    {

        $categories = new Categories;
        $categories->name = $request->name;

        // upload file : name,location
        $file = $request->file('photo');
        $fileName = time().$file->getClientOriginalName();
        $location = public_path('./files/');
        $file->move($location, $fileName);

        $categories->image = $fileName;
        $categories->parent_id = $request->parent_id;

        // ******** //
        $categories->save();
        return redirect()->back()->with('done', 'insert successfuly');
    }
    // go to edit categories page
    public function edit($id)
    {
        $categories = Categories::find($id);
        $Choosecategories = Categories::where('parent_id', null)->get();
        $categoryCount = Categories::where('id',$id)->withCount('child')->firstOrFail();


        return view('dashboard.Categories.edit' ,compact('categories','Choosecategories','categoryCount'));
    }

    // update categories in database
    public function update(UpdateRequest $request ,$id )
    {
        $categories = Categories::find($id);

        $categories->name = $request->name;
        // upload file : name,location
        $file = $request->file('photo');

        if ($file != null) {
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('./files/');
            $file->move($location, $fileName);
            $path = public_path('./files/') . $categories->image;
            unlink($path);
        } else {
            $fileName = $categories->image;
        }
        $categories->image = $fileName;
        $categories->parent_id = $request->parent_id;
 
        // ******** //
        $categories->save();
        return redirect()->route('categories.index');

    }
    // delete category in database
    public function destroy($id){
        $categories = Categories::find($id);
        $path = public_path('./files/') . $categories->image;
        unlink($path);
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
