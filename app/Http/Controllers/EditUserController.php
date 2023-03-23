<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
 
class EditUserController extends Controller
{
    public function index()
    {
        $countries = Country::get();
        $cities = City::get();
        return view('edit_user',compact('countries','cities'));
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
        if($request->hasFile('avatar')){ 
            $request->avatar->store('public/uplodes');
            User::where('user_id', $user_id)->update(["avatar" => $request->avatar->hashName()]);
        }
        return back()->with('message', 'User updated sucessfully');
    }
}