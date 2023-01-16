<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerifyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function email_verfiy(){
        if(Auth::user()->email_verified_at){
            return redirect()->route('home');
        }else{
            return view('auth.emailverifycode');
        }

    }
    public function code(Request $request){
        $request->validate([
            'code'=>'required',
        ]);
        $user=Auth::user();
        if($request->code == $user->code){
            $user->update([
                'email_verified_at'=>Carbon::now(),
            ]);
            return redirect()->route('home')->with('success','Logged in successfully');
        }else{
            return back()->with('error','code is not true');
        }
    }

}
