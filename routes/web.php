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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function(){
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/item', 'Admin\ProductController');
    Route::resource('/order', 'Admin\OrderController');
    Route::resource('/payment', 'Admin\PaymentController');
    Route::resource('/user', 'Admin\UserController');
});
