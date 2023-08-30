<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function users(){
        $users = User::where('type','=','user')->get();
        return view('dashboard.users.index',compact('users'));
    }
    public function showUser($id){
        $users = User::find($id);
        return view('dashboard.users.showUser',compact('users'));
    }
    public function admins(){
        $users = User::where('type','=','admin')->get();
        return view('dashboard.users.admins',compact('users'));
    }
    
}
