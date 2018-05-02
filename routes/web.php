<?php
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index');    
    Route::get('/dashboards', 'DashboardController@index')->name('dashboards.index');    

    Route::resource('komoditas', 'KomoditasController');

    Route::resource('jenisSaprotans', 'JenisSaprotanController');

    Route::resource('saprotans', 'SaprotanController');

    Route::resource('vendors', 'VendorController');

    Route::resource('penggaraps', 'PenggarapController');

    Route::resource('pasangans', 'PasanganController');

    Route::resource('roles', 'RoleController');

    Route::resource('users', 'UserController');

    Route::resource('panens', 'PanenController');

    Route::get('profile', 'ProfileController@index')->name('profile.index');
    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('profile/{id}', 'ProfileController@update')->name('profile.update');            
    
});


Route::get('/mailable', function () {
    $user = App\User::find(1);
    $password = str_random(6);

    return new App\Mail\NewPasswordMail($user, $password);
});
