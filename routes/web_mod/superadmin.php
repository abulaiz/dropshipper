<?php 

Route::get('/members', function () {
    return view('front_end/layout/superadmin/user');
});

Route::get('/registrant', function () {
    return view('front_end/layout/superadmin/registrant');
});
// Route::post('/user', 'UserController@save')->name('adduser');
// Route::post('/user/edit', 'UserController@edituser')->name('editUser');