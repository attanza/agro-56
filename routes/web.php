<?php
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'KomoditasController@index');

    Route::resource('komoditas', 'KomoditasController');

    Route::resource('jenisSaprotans', 'JenisSaprotanController');

    Route::resource('saprotans', 'SaprotanController');

    Route::resource('vendors', 'VendorController');

    Route::resource('penggaraps', 'PenggarapController');

    Route::resource('pasangans', 'PasanganController');

    Route::resource('roles', 'RoleController');

    Route::resource('users', 'UserController');
});




Route::resource('panens', 'PanenController');