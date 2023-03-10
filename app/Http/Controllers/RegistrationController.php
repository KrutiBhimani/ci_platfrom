<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Admin;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
 
class RegistrationController extends Controller
{
 
    public function registration()
    {
        $banners = Banner::where('deleted_at', null)->orderBy('sort_order','asc')->get();
        return view('registration', compact('banners'));
    }
       
 
    public function customRegistration(Request $request)
    {  
        $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|confirmed|min:3',
            'phone_number' => 'required',
        ]);
            
        $data = $request->all();
        $check = $this->create($data);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
          return redirect()->intended('home');
        }
        return redirect('/login')->with('message', 'Your Registration is sucessfull');
    }
 
 
    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'city_id' => 1,
            'country_id' => 1,
            'password' => Hash::make($data['password'])
        ]);
    }    
}