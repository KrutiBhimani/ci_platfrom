<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class LoginController extends Controller
{
 
    public function index()
    {
        return view('login');
    }  
    public function customLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
        else{
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended('admin/user');
            }
            else{
                return redirect('/login')->with('error', 'Login details are not valid');
            }
        }
        
    }
}