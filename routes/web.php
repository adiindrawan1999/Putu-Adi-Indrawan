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
Route::get('/cetak', function () {
    return view('penjualan.pdf.cetak');
});

Auth::routes();
Route::middleware(['auth', 'check-permission:admin|superadmin|user'])->group(function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('penjualan', 'PenjualanController');
    Route::get('barang/{id}', 'BarangController@search');
});


Route::middleware(['auth', 'check-permission:admin|superadmin'])->group(function () {
    Route::resource('barangs', 'BarangController');
    Route::resource('pelanggan', 'PelangganController');
    Route::resource('pegawai', 'PegawaiController');
    Route::resource('/users', 'UserController');
});


Route::resource('users', 'UserController');