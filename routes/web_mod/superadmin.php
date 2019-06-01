<?php 

Route::get('/user', function () {
    return view('front_end/layout/superadmin/user');
});

Route::post('/user', 'UserController@save')->name('adduser');
Route::post('/user/update', 'UserController@update')->name('updateUser');