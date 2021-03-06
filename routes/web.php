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
Route::post('/login', 'Admin\AuthController@login')->name('log.login');
Route::post('/logout', 'Admin\AuthController@logout')->name('log.logout');
Route::get('/register', 'Admin\RegisterController@index')->name('register.index');

//Sosmed
Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

Route::prefix('admin')->group(function(){
    //Didalam
    Route::get('/', 'Admin\HomeController@index');
    Route::get('/category/table', 'Admin\CategoryController@table')->name('category.table');
    Route::resource('/category', 'Admin\CategoryController');
    Route::resource('/item', 'Admin\ProductController');
    Route::resource('/order', 'Admin\OrderController');
    Route::resource('/payment', 'Admin\PaymentController');
	Route::resource('/user', 'Admin\UserController');
    Route::post('/email/{id}','Admin\OrderController@sendmail')->name('order.mail');

	//Report
	Route::get('/report', 'Admin\ReportController@index')->name('report.index');
	Route::get('/report/pdf', 'Admin\ReportController@pdf')->name('report.pdf');
	Route::get('/report/excel', 'Admin\ReportController@excel')->name('report.excel');
    Route::get('/report/download', 'Admin\ReportController@download')->name('report.download');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
