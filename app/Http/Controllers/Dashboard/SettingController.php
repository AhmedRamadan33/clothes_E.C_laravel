<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // go to settings page
    public function index(){
        $settings = Settings::first();
        return view('dashboard.settings.index',compact('settings'));
    }
    // update in database
    public function update(Request $request,$id){
        // Start validation code
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'=> 'required|string',
            'description'=> 'required|string',
            'email'=> 'required|string|email',
            'phone'=> 'required|string',
            'address'=> 'required|string',
            'facebook'=> 'required|string',
            'twitter'=> 'required|string',
            'instagram'=> 'required|string',
            'youtube'=> 'required|string',
            'tiktok'=> 'required|string',
        ]);
        // End validation code
        $settings = Settings::find($id) ;
        $settings->name = $request->name ;
        $settings->description = $request->description;
        $settings->email = $request->email ;
        $settings->phone = $request->phone ;
        $settings->address = $request->address ;
        $settings->facebook = $request->facebook ;
        $settings->twitter = $request->twitter ;
        $settings->instagram = $request->instagram ;
        $settings->youtube = $request->youtube ;
        $settings->tiktok = $request->tiktok ;

        // upload file : name,location
        $file = $request->file('logo');

        if ($file != null) {
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('./files/');
            $file->move($location, $fileName);
            $path = public_path('./files/') . $settings->logo;
            unlink($path);
        } else {
            $fileName = $settings->logo;
        }
        $settings->logo = $fileName;

        // ******** //
        $file2 = $request->file('favicon');

        if ($file2 != null) {
            $fileName2 = time() . $file2->getClientOriginalName();
            $location2 = public_path('./files/');
            $file2->move($location2, $fileName2);
            $path2 = public_path() . "/files/" . $settings->favicon;
            unlink($path2);
        } else {
            $fileName2 = $settings->favicon;
        }
        // ************ //
        $settings->favicon = $fileName2;

        //End upload file code

        $settings->save();
        return redirect()->back()->with('done','updated done');
    }
}
