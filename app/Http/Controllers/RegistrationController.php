<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    public function index()
    {
        $banners = Banner::where('deleted_at', null)->orderBy('sort_order', 'asc')->get();
        return view('registration', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:3',
            'phone_number' => 'required',
        ]);

        User::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'city_id' => 1,
            'country_id' => 1,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }
        return redirect('/login')->with('message', 'Your Registration is sucessfull');
    }

}