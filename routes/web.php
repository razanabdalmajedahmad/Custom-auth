<?php

use App\Http\Controllers\Auth\EmailVerifyController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController as AuthLogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user=Auth::user();
    if($user->email_verified_at !=NULL && $user){
        return view('welcome');
    }else{
        return redirect()->route('email-verfiy');
    }
})->name('welcome');
Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('invalid-register',[RegisterController::class,'valid_register'])->name('valid-register');
Route::get('home',[HomeController::class,'home'])->name('home');
Route::get('email/verfiy',[EmailVerifyController::class,'email_verfiy'])->name('email-verfiy');
Route::post('code',[EmailVerifyController::class,'code'])->name('code');
Route::get('logout',[LogoutController::class,'logout'])->name('logout');
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('valid-login',[LoginController::class,'valid_login'])->name('valid-login');
Route::get('forget_password',[ResetPasswordController::class,'forget_password'])->name('forget_password');
Route::post('submitforgetpassword',[ResetPasswordController::class,'submitforgetpassword'])->name('submitforgetpassword');
Route::get('get_reset_password/{token}',[ResetPasswordController::class,'get_reset_password'])->name('get_reset_password');
Route::post('resetpasswordvalid',[ResetPasswordController::class,'resetpasswordvalid'])->name('resetpasswordvalid');
