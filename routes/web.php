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
    return view('login.login');
});
Route::post('login','loginController@login')->name('login');
Route::get('/adminDashboard','adminController@index');
Route::get('/dashboard',function(){
	return view('layouts.dashboard');
});



// Dokter
Route::get('/dataDokter','dokterController@index');
Route::get('dataDokter','dokterController@index');
Route::post('dokter/store','dokterController@store');
Route::get('dokter/edit/{x}','dokterController@edit');
Route::post('dokter/update','dokterController@update');
Route::get('dokter/hapus/{y}','dokterController@destroy');

// Terapis
Route::get('/dataTerapis','terapisController@index');
Route::get('dataTerapis','terapisController@index');
Route::post('terapis/store','terapisController@store');
Route::get('terapis/edit/{z}','terapisController@edit');
Route::post('terapis/update','terapisController@update');
Route::get('terapis/hapus/{c}','terapisController@destroy');

// Customer
Route::get('/dataCustomer','customerController@index');
Route::get('dataCustomer','customerController@index');
Route::post('customer/store','customerController@store');
Route::get('customer/edit/{a}','customerController@edit');
Route::post('customer/update','customerController@update');
Route::get('customer/hapus/{y}','customerController@destroy');

// Perawatan
Route::get('/dataPerawatan','perawatanController@index');
Route::get('dataPerawatan','perawatanController@index');
Route::post('perawatan/store','perawatanController@store');
Route::get('perawatan/edit/{rawat}','perawatanController@edit');
Route::post('perawatan/update','perawatanController@update');
Route::get('perawatan/hapus/{y}','perawatanController@destroy');

// Bahan Habis Pakai
// Route::get('/dataBahan','bahanController@index');
Route::get('dataBahan','bahanController@index');
Route::post('bahan/store','bahanController@store');
Route::post('bahan/update/{x}','bahanController@update');
Route::get('bahan/hapus/{y}','bahanController@destroy');

// Produk
Route::get('dataProduk','produkController@index');
Route::post('produk/store','produkController@store');
Route::get('produk/edit/{produk}','produkController@edit');
Route::post('produk/update','produkController@update');
Route::get('produk/hapus/{y}','produkController@destroy');
