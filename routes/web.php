<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/', function () {
//     return view('landing_page');
// });
Route::get('/', ['as' => '', 'uses' => '\App\Http\Controllers\UserController@landing_page']);

Route::get('/login', ['as' => 'login', 'uses' => '\App\Http\Controllers\UserController@login']);
Route::post('/check_login', ['as' => 'check_login', 'uses' => '\App\Http\Controllers\UserController@checkLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => '\App\Http\Controllers\UserController@logout']);

Route::get('/register', ['as' => 'register', 'uses' => '\App\Http\Controllers\UserController@register_page']);
Route::post('/register_user', ['as' => 'register_user', 'uses' => '\App\Http\Controllers\UserController@register_user']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => '\App\Http\Controllers\UserController@dashboard']);
    Route::get('/user_profile', ['as' => 'user_profile', 'uses' => '\App\Http\Controllers\UserController@user_profile']);
    Route::get('/orders', ['as' => 'orders', 'uses' => '\App\Http\Controllers\UserController@orders']);
    Route::get('/products', ['as' => 'products', 'uses' => '\App\Http\Controllers\CropController@products']);
    Route::get('/add_product', ['as' => 'add_product', 'uses' => '\App\Http\Controllers\CropController@add_product']);
    Route::get('/add_crops', ['as' => 'add_crops', 'uses' => '\App\Http\Controllers\CropController@add_crops']);


});

