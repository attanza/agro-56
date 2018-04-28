<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('komoditas', 'KomoditasController');

    Route::resource('jenisSaprotans', 'JenisSaprotanController');

    Route::resource('saprotans', 'SaprotanController');

    Route::resource('vendors', 'VendorController');

    Route::resource('penggaraps', 'PenggarapController');

    Route::resource('pasangans', 'PasanganController');
});
