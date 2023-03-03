<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class PolicyController extends Controller
{
    public function policy()
    {
        if(Auth::check()){
            return view('policy');
        }
        
        return redirect('/login')->with('error', 'you are not allowed to access please try login!');
    }

}