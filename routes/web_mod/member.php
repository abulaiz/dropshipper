<?php 

// Menu Order Member
Route::get('/order', function () {
    return view('front_end/layout/order');
});

Route::post('/order/store', 'OrderProductController@store')->name('orderStock');