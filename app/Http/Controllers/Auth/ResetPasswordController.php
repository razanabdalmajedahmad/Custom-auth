<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\PasswordResets;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function forget_password(){
        return view('auth.resetpassword');
    }
    public function submitforgetpassword(Request $request){
        $request->validate([
            'email'=>'required'
        ]);
        $token=Str::random(64);
        PasswordResets::create([
            'email' => $request->email,
            'token' => $token,
        ]);
        $details=[
            'token'=>$token
        ];
        Mail::to($request->email)->send(new ResetPassword($details));
        return back()->with('success','We have e-mailed your password reset link');

    }
    public function get_reset_password($token){
        return view('auth.getpassword',compact('token'));
    }
    public function resetpasswordvalid(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $password_reset=PasswordResets::where('email',$request->email)->where('token',$request->token)->first();
        if($password_reset){
            $user=User::where('email',$request->email)->first();
            if($user){
                $user->update([
                    'password',Hash::make($request->password)
                ]);
                $password_reset->delete();
                return redirect()->route('login')->with('success','Your password has been changed!');
            }else{
                $password_reset->delete();
                return back()->with('error','You do not have an account');
            }
        }else{
            return back()->with('error','invalid link');
        }
    }
}
