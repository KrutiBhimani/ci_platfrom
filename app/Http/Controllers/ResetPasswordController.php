<?php 
  
namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use App\Models\User; 
use Mail; 
use Hash;
use App\Models\Banner;
use Illuminate\Support\Str;
  
class ResetPasswordController extends Controller
{

    public function show($token) {
        $updatePassword = DB::table('password_resets')->where(['token' => $token])->first();
        $diff =  now()->diffInMinutes(Carbon::parse($updatePassword->created_at));
        if($diff >= 240){
            return redirect('/forget-password')->with('error', 'Your time is over enter email address again!');
        }
        else{
            $banners = Banner::where('deleted_at', null)->orderBy('sort_order','asc')->get();
            return view('reset', ['token' => $token], compact('banners'));
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
  
        $updatePassword = DB::table('password_resets')->where(['token' => $request->token])->first();
  
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }
  
        $user = User::where('email', $updatePassword->email)->update(['password' => Hash::make($request->password)]);
 
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect('/login')->with('message', 'Your password has been changed!');
    }

}
