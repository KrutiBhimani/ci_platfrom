<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class AppController extends Controller
{
    public function app()
    {
        if(Auth::check()){
            return view('admin.app');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
     
}