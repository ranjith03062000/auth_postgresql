<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SignInandUpController as SingInandUp;
use App\Http\Controllers\Api\CrudController as Crud;

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
	Route::get('/getuers ',[SingInandUp::class,'getuers']);
	Route::post('/register ',[SingInandUp::class,'register']);
	Route::post('/login',[SingInandUp::class,'login']);
	Route::post('/forgetPassword',[SingInandUp::class,'forgetPassword']);
});
Route::post('/add_user',[Crud::class,'add_user']);
Route::get('/get_user',[Crud::class,'get_user']);
Route::post('/edit_user',[Crud::class,'edit_user']);
Route::post('/update_user',[Crud::class,'update_user']);
Route::post('/delete_user',[Crud::class,'delete_user']);