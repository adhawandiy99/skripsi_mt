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

Route::get('/login', function () {
    return view('login');
});
Route::post('/login','LoginController@ceklogin');
Route::group(['middleware' => 'auth'], function() {
	Route::get('/','HomeController@index');

	//user
    Route::get('/teknisi','TeknisiController@index');
    Route::get('/teknisi/{id}','TeknisiController@input');
    Route::post('/teknisi/{id}','TeknisiController@save');
    Route::post('/deleteTeknisi/{id}','TeknisiController@delete');
	//order
    Route::get('/order','OrderController@index');
    Route::get('/order/{id}','OrderController@input');
    Route::post('/order/{id}','OrderController@save');
    Route::post('/deleteOrder/{id}','OrderController@delete');
	//material
    Route::get('/material','MaterialController@index');
    Route::get('/material/{id}','MaterialController@input');
    Route::post('/material/{id}','MaterialController@save');
    Route::post('/deleteMaterial/{id}','MaterialController@delete');
});