<?php 

// Root Email
Route::get('/email', function () {
    return view('front_end/layout/email/index');
});

// Root Detail Email
Route::get('/email/detail', function () {
    return view('front_end/layout/email/detail');
});

// Root Email
Route::get('/email/mailbox', function () {
    return view('front_end/layout/email/mailbox');
});