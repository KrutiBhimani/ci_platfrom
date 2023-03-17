<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Admin;
use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $pagecount = 5;
        if (isset($_REQUEST['page'])) {
          $page = $_REQUEST['page'];
        } else
          $page = 1;
        $cnts = User::where('deleted_at', null)->orderBy('user_id','desc')->get()->count();
        $cnt = ceil($cnts / $pagecount);
        $users = User::where('deleted_at', null)->orderBy('user_id','desc')->paginate($pagecount);
        if ($request->get('search')) { 
            $users = User::where('first_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('last_name', 'LIKE', '%' . $request->get('search') . '%')->orwhere('email', 'LIKE', '%' . $request->get('search') . '%')->where('deleted_at', null)->get();
        }
        return view('admin.user', compact('users', 'page','cnt'));
    }

    public function create()
    {
        $countries = Country::get();
        $cities = City::get();
        return view('admin.add_user',compact('countries','cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|min:3',
            'phone_number' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png'
        ]);
        $avatar = null;
        if($request->hasFile('avatar')){ 
            $avatar = $request->avatar->hashName();
            $request->avatar->store('public/uplodes');
        }
        $user = new User([
            "first_name" => $request->get('first_name'),
            "last_name" => $request->get('last_name'),
            "email" => $request->get('email'),
            "phone_number" => $request->get('phone_number'),
            "password" => Hash::make($request->get('password')),
            "avatar" => $avatar,
            "employee_id" => $request->get('employee_id'),
            "department" => $request->get('department'),
            "country_id" => $request->get('country_id'),
            "city_id" => $request->get('city_id'),
            "profile_text" => $request->get('profile_text'),
            "status" => $request->get('status'),
        ]);
        $user->save();
        return redirect("admin/user")->with('message', 'New user added sucessfully');
    }

    public function edit($user_id)
    {
        $user = User::where(['user_id' => $user_id])->first();
        $countries = Country::get();
        $cities = City::get();
        return view('admin.edit_user',compact('countries','cities','user'));
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
            'phone_number' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png'
        ]);
        $user = User::where('user_id', $user_id)->first();
        $avatar = $user->avatar;
        if($request->hasFile('avatar')){ 
            $avatar = $request->avatar->hashName();
            $request->avatar->store('public/uplodes');
        }
        $user = [
            "first_name" => $request->get('first_name'),
            "last_name" => $request->get('last_name'),
            "email" => $request->get('email'),
            "phone_number" => $request->get('phone_number'),
            "password" => Hash::make($request->get('password')),
            "avatar" => $avatar,
            "employee_id" => $request->get('employee_id'),
            "department" => $request->get('department'),
            "country_id" => $request->get('country_id'),
            "city_id" => $request->get('city_id'),
            "profile_text" => $request->get('profile_text'),
            "status" => $request->get('status'),
        ];
        User::where('user_id', $user_id)->update($user);
        return redirect("admin/user")->with('message', 'User updated sucessfully');
    }

    public function destroy($user_id)
    {
        User::where('user_id', $user_id)->update(['deleted_at' => Carbon::now()->toDateTimeString()]);
        return redirect("admin/user")->with('message', 'User deleted sucessfully');
    }
}