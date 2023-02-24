<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
 
class BannerController extends Controller
{
    public function banner()
    {
        if(Auth::check()){
            $banners = Banner::where('deleted_at', null)->get();
            // if ($request->get('search')) { 
            //     $users = User::where('first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('email', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            // }
            return view('admin.banner', compact('banners'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function add_banner()
    {
        if(Auth::check()){
            return view('admin.add_banner');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function edit_banner()
    {
        if(Auth::check()){
            return view('admin.edit_banner');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}