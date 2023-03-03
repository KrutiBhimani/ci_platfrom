<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class StoriesController extends Controller
{
    public function story()
    {
        if(Auth::check()){
            return view('story');
        }
        
        return redirect('/login')->with('error', 'you are not allowed to access please try login!');
    }

}