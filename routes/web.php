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

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'HomeController@dashboard');
Route::get('/produk','HomeController@produk');
Route::post('/produk/tambahedit','HomeController@postAddEditItem');
Route::get('/produk/get/{id}','HomeController@getProduk');
Route::post('/produk/hapus','HomeController@postDelProduk');



Route::get('/karyawan','AdminController@karyawan');
Route::get('/karyawan/get/{id}','AdminController@getKaryawan');
Route::post('/karyawan/hapus','AdminController@postHapusKaryawan');
Route::post('/karyawan/tambahedit','AdminController@postAddEditKaryawan');


