<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class MissionController extends Controller
{
    public function mission()
    {
        if(Auth::check()){
            return view('admin.mission');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function add_mission()
    {
        if(Auth::check()){
            return view('admin.add_mission');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function edit_mission()
    {
        if(Auth::check()){
            return view('admin.edit_mission');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}