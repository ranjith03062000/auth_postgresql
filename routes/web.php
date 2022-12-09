<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\Api\UsersControllers as User;
use App\Http\Controllers\Api\AuthController as Auth;
use App\Http\Controllers\Api\SettingsController as Settings;


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
Route::group(['middleware' => 'auth'], function(){
});


Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('logout', function () {
    return view('login');
})->name('login'); 

Route::get('users', function () {
    return view('users'); 
});
Route::get('mail', function () {
    return view('mail'); 
});

Route::post('/adminlogin',[Admin::class, 'adminLogin']);
Route::get('/getusersList',    [User::class, 'getusersList']);
Route::post('/addUsers',    [User::class, 'addUsers']);
Route::post('/editUser',    [User::class, 'editUser']);
Route::post('/updateUsers',    [User::class, 'updateUsers']);
Route::post('/deleteUserList',    [User::class, 'deleteUserList']);






