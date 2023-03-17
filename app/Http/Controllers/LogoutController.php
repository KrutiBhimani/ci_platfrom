<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Admin;

class LogoutController extends Controller
{

    public function index()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }
}