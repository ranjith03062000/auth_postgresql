<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Api\EncryptionController as EncryptDecrypt;
use App\Http\Controllers\Api\SignInandUpController as SingInandUp;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => ['SigninandUpMiddleWare']], function() {
	Route::post('/register ',[SingInandUp::class,'register']);
	Route::post('/login',[SingInandUp::class,'login']);
	Route::post('/forgetPassword',[SingInandUp::class,'forgetPassword']);
});
Route::post('/encryption',[EncryptDecrypt::class, 'encryption']);
Route::post('/decryption',[EncryptDecrypt::class,'decryption']);
Route::post('/signUpFun',[SingInandUp::class,'signUpFun']);