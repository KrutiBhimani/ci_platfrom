<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class HomeController extends Controller
{
    public function home()
    {
        if(Auth::check()){
            return view('home');
        }
        
        return redirect('/login')->with('error', 'you are not allowed to access please try login!');
    }
     
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}