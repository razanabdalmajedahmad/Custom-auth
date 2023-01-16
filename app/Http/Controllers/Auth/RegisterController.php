<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerify;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(){
        return view('auth.register');
    }
    public function valid_register(Request $request){
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email|unique:users,email',
                'phone'=>'required|unique:users,phone',
                'password' => 'required',
                'password_confirmation' => 'required|same:password'
            ]
        );
        $code=Str::random(4);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password' =>Hash::make($request->password),
            'code'=>$code
        ]);
        $user=$request->only('email','password');
        $token=Auth::attempt($user);
        if( $token){
            $details=[
                'name'=>$request->name,
                'code'=>$code
            ];

            // Mail::to($request->email)->send(new EmailVerify($details));
            return redirect()->route('email-verfiy')->with('success','Check the email and enter the code');
        }else{
            return back();
        }
    }
}
