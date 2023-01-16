<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','EmailVerify']);
    }
    public function home(){
        return view('home');
    }
}
