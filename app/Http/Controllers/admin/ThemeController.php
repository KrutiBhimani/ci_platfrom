<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Mission_theme;
use Illuminate\Support\Facades\Auth;
 
class ThemeController extends Controller
{
    public function theme()
    {
        if(Auth::check()){
            $themes = Mission_theme::where('deleted_at', null)->get();
            // if ($request->get('search')) { 
            //     $users = User::where('first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('email', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            // }
            return view('admin.theme', compact('themes'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function add_theme()
    {
        if(Auth::check()){
            return view('admin.add_theme');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function edit_theme()
    {
        if(Auth::check()){
            return view('admin.edit_theme');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    } 
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}