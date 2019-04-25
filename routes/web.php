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



// Login
Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

// Root Home
Route::get('/home', function () {
    return view('front_end/layout/home');
});

// Root order
Route::get('/order', function () {
    return view('front_end/layout/order');
});

// Root Email
Route::get('/email', function () {
    return view('front_end/layout/email');
});