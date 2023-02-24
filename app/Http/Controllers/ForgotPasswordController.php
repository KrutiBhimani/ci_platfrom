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
  
class ForgotPasswordController extends Controller
{

    public function showForgetPasswordForm()
    {
        $banners = Banner::where('deleted_at', null)->orderBy('sort_order','asc')->get();
        return view('forgot', compact('banners'));
    }
  

    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user',
        ]);
  
        $token = Str::random(64);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);
  
        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

}