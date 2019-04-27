<?php

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

Route::get('/', 'Admin\AuthController@index')->name('auth.index');
Route::post('/login', 'Admin\AuthController@login')->name('auth.login');
Route::post('/logout', 'Admin\AuthController@logout')->name('auth.logout');

Route::prefix('admin')->group(function(){
    //Didalam
    Route::get('/', function(){
        return view('admin.index');
    });
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/item', 'Admin\ProductController');
    Route::resource('/order', 'Admin\OrderController');
    Route::resource('/payment', 'Admin\PaymentController');
	Route::resource('/user', 'Admin\UserController');
});
