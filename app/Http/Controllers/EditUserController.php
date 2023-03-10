<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
 
class EditUserController extends Controller
{
    public function edit_user()
    {
        return view('edit_user');
    }

}