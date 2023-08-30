<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request )
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'phone' => ['required','max:255'],
            'address' => ['required','string','max:255'],
            'city' => ['required','string','max:255'],
            'country' => ['required','string','max:255'],
            'zip' => ['required','max:255'],
            'twitter' => ['required','max:255'],
            'facebook' => ['required','max:255'],
            'instagram' => ['required','max:255'],
            'linkedIn' => ['required','max:255'],
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = request('name');
        $user->phone = request('phone');
        $user->address = request('address');
        $user->city = request('city');
        $user->zip = request('zip');
        $user->country = request('country');
        $user->twitter = request('twitter');
        $user->facebook = request('facebook');
        $user->instagram = request('instagram');
        $user->linkedIn = request('linkedIn');

        //start upload file code
        $file = $request->file('photo');
        if ($file != null) {
            $fileName = time() . $file->getClientOriginalName();
            $location = public_path('./files/');
            $file->move($location, $fileName);
            $path = public_path('./files/') . $user->image;
            if ($path != public_path('./files/') . 'F.B.fack.png')  {
                unlink($path);
            }
        } else {
            $fileName = $user->image;
        }
        $user->image = $fileName;
        //End upload file code
        $user->save();
        return redirect()->route('profile.index')->with('done', 'Updated Profile successfully');
    }
    // change password 
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => ['required','string'],
            'new_password' => ['required','string'],
            'confirm_password' => ['required','string','same:new_password'],
        ]);

        $user = User::find(Auth::user()->id);
        if(Hash::check($request->old_password,$user->password)){
            if( $request->new_password == $request->confirm_password){
                $user->password = bcrypt($request->new_password );
                $user->save();
                return redirect()->route('profile.index')->with('done', 'Updated Password successfully');
            }else{
                return redirect()->route('profile.index')->with('done', 'New password and confirm password not match');
            }
           
        }else{
            return redirect()->route('profile.index')->with('done', 'Old password not match');
        }    
    }
}
