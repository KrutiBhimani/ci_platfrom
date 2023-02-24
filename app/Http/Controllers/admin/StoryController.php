<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class StoryController extends Controller
{
    public function story()
    {
        if(Auth::check()){
            return view('admin.story');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
     
}