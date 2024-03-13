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
    Route::get('/crops', ['as' => 'crops', 'uses' => '\App\Http\Controllers\CropController@crops']);
    Route::get('/initially_uploaded_crops', ['as' => 'initially_uploaded_crops', 'uses' => '\App\Http\Controllers\CropController@initially_uploaded_crops']);
    //Route::get('/certified_crops', ['as' => 'certified_crops', 'uses' => '\App\Http\Controllers\CropController@certified_crops']);
    
    //Route::get('/add_product', ['as' => 'add_product', 'uses' => '\App\Http\Controllers\CropController@add_product']);
    Route::get('/view_add_crops', ['as' => 'view_add_crops', 'uses' => '\App\Http\Controllers\CropController@view_add_crops']);
    Route::post('/add_new_crops', ['as' => 'add_new_crops', 'uses' => '\App\Http\Controllers\CropController@add_new_crops']);
    Route::get('/private_key_generate', ['as' => 'private_key_generate', 'uses' => '\App\Http\Controllers\CropController@private_key_generate']);
    Route::get('/generate_key', ['as' => 'generate_key', 'uses' => '\App\Http\Controllers\CropController@generate_key']);

    Route::get('/tokenization', ['as' => 'tokenization', 'uses' => '\App\Http\Controllers\CropController@tokenization']);
    Route::get('/store_crop', ['as' => 'store_crop', 'uses' => '\App\Http\Controllers\CropController@view_store_crop']);
    Route::get('/crop_store', ['as' => 'crop_store', 'uses' => '\App\Http\Controllers\CropController@crop_store']);
    
    Route::get('/add_to_marketplace', ['as' => 'add_to_marketplace', 'uses' => '\App\Http\Controllers\CropController@add_to_marketplace']);
    Route::get('/crops_on_marketplace', ['as' => 'crops_on_marketplace', 'uses' => '\App\Http\Controllers\CropController@crops_on_marketplace']);

    Route::get('/crop_timeline', ['as' => 'crop_timeline', 'uses' => '\App\Http\Controllers\CropController@crop_timeline']);
    Route::get('/recharge_balance_view', ['as' => 'recharge_balance_view', 'uses' => '\App\Http\Controllers\UserController@recharge_balance_view']);
    Route::get('/recharge_amount/{amount}', ['as' => 'recharge_amount', 'uses' => '\App\Http\Controllers\UserController@recharge_amount']);

    //For Investigation
    Route::get('/view_investigation', ['as' => 'view_investigation', 'uses' => '\App\Http\Controllers\CropController@view_investigation']);
    Route::get('/initially_uploaded_LC', ['as' => 'initially_uploaded_LC', 'uses' => '\App\Http\Controllers\CropController@initially_uploaded_LC']);
    //Route::get('/inspect_by_LC', ['as' => 'inspect_by_LC', 'uses' => '\App\Http\Controllers\CropController@inspect_by_LC']);
    Route::get('/inspect_by_LC/{id}', ['as' => 'inspect_by_LC', 'uses' => '\App\Http\Controllers\CropController@inspect_by_LC']);
    Route::post('/add_inspection_certificate', ['as' => 'add_inspection_certificate', 'uses' => '\App\Http\Controllers\CropController@add_inspection_certificate']);
    Route::get('/certified_crops', ['as' => 'certified_crops', 'uses' => '\App\Http\Controllers\CropController@certified_crops_LC']);


    
});

