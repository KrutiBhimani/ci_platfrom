<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        $banners = Banner::where('deleted_at', null)->orderBy('sort_order', 'asc')->get();
        return view('login', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        } elseif (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/user');
        } else {
            return redirect('/login')->with('error', 'Login details are not valid');
        }
    }
}