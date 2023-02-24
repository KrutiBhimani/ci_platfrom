<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
 
class SkillController extends Controller
{
    public function skill()
    {
        if(Auth::check()){
            $skills = Skill::where('deleted_at', null)->get();
            // if ($request->get('search')) { 
            //     $users = User::where('first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('email', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
            // }
            return view('admin.skill', compact('skills'));
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    }
    public function add_skill()
    {
        if(Auth::check()){
            return view('admin.add_skill');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    } 
    public function edit_skill()
    {
        if(Auth::check()){
            return view('admin.edit_skill');
        }
   
        return redirect("login")->with('error', 'are not allowed to access');
    } 
 
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return Redirect('login');
    }
}