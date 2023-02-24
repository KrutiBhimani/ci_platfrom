<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Cms_page;
use Illuminate\Support\Facades\Auth;
 
class PageController extends Controller
{
    public function page()
    {
        if(Auth::check()){
            $pages = Cms_page::where('deleted_at', null)->get();
            // if ($request->get('search')) { 
            //     $users = User::where('first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('email', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            // }
            return view('admin.page', compact('pages'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function add_page()
    {
        if(Auth::check()){
            return view('admin.add_page');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function edit_page()
    {
        if(Auth::check()){
            return view('admin.edit_page');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}