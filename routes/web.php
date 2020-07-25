<?php

use App\UserDetail;

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
    return view('welcome');
});

// For testing
Route::get('/userdetail/{public_id}', function ($public_id) {
    $userDetail = UserDetail::where('public_id', $public_id)->get();
    //dd($userDetail);
});

// Public Landing Page
Route::get('/shop/{public_id}', 'ProductController@shop')->name('shop');
Route::get('/public_list/{public_id}', 'ProductController@public_list')->name('public_list');

Route::get('/checkout' , 'ProductController@checkout')->name('checkout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{path}','HomeController@index')->where( 'path', '([A-z\d-/_.]+)?' );
