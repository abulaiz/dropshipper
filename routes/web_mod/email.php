<?php 

// Root Email
Route::get('/email', function () {
    return view('front_end/layout/email');
})->middleware('auth');