<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function login(){
        return view('auth.login');
    }
    public function valid_login(Request $request){
        $login=$request->email_or_phone;
        $filter=filter_var($login,FILTER_VALIDATE_EMAIL) ? "email" : "phone";
        request()->merge([$filter=>$login]);
        $request->validate(
            [
                'email_or_phone'=>'required',
                'email'=>'email',
                'password' => 'required',
            ]
        );
        $user=$request->only($filter,'password');
        $token=Auth::attempt($user,$request->remember_me);
        if( $token){
            return redirect()->route('home')->with('success','Logged in successfully');
        }else{
            return back()->with('error','user not found');
        }
    }
}
