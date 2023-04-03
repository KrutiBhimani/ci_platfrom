<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\User_skill;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Validator;

class EditUserController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        $cities = City::where("country_id", Auth::user()->country_id)->get();
        $selected_skills = User_skill::where('user_id', Auth::user()->user_id)
            ->leftJoin('skill', 'skill.skill_id', '=', 'user_skill.skill_id')->get();
        $skills = Skill::where('deleted_at', null)->get();
        return view('edit_user', compact('countries', 'cities', 'selected_skills', 'skills'));
    }

    public function store(Request $request) //password change
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        if (Hash::check($request->get('old_password'), Auth::user()->password)) {
            if ($request->get('password') == $request->get('password_confirmation')) {
                User::where('user_id', Auth::user()->user_id)->update(['password' => Hash::make($request->get('password'))]);
                return back()->with('message', 'password updated successfully');
            }
        } else {
            return back()->with('error', 'Your old password did not match!');
        }
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'first_name' => 'max:16',
            'last_name' => 'max:16',
            'employee_id' => 'max:16',
            'department' => 'max:16',
            'title' => 'max:255',
            'city_id' => 'required',
            'country_id' => 'required',
            'avatar' => 'mimes:jpeg,bmp,png'
        ]);
        User::where('user_id', $user_id)->update([
            "first_name" => $request->get('first_name'),
            "last_name" => $request->get('last_name'),
            "manager" => $request->get('manager'),
            "title" => $request->get('title'),
            "employee_id" => $request->get('employee_id'),
            "profile_text" => $request->get('profile_text'),
            "why_i_volunteer" => $request->get('why_i_volunteer'),
            "department" => $request->get('department'),
            "country_id" => $request->get('country_id'),
            "city_id" => $request->get('city_id'),
            "availability" => $request->get('availability'),
            "linked_in_url" => $request->get('linked_in_url'),
        ]);
        if ($request->hasFile('avatar')) {
            $request->avatar->store('public/uplodes');
            User::where('user_id', $user_id)->update(["avatar" => $request->avatar->hashName()]);
        }
        if ($request->get('skill')) {
            User_skill::where('user_id', $user_id)->delete();
            $skill = $request->get('skill');
            foreach ($skill as $item) {
                User_skill::insert([
                    'user_id' => $user_id,
                    'skill_id' => $item,
                    'created_at' => Carbon::now()->toDateTimeString(),
                ]);
            }
        }
        return back()->with('message', 'User updated sucessfully');
    }
}