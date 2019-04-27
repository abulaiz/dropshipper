<?php 

// Root Detail Email
Route::get('/detailemail', function () {
    return view('front_end/layout/detailemail');
})->middleware('auth');