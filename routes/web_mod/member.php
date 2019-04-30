<?php 

// Menu Order Member
Route::get('/order', function () {
    return view('front_end/layout/order');
});

// Menu History Order
Route::get('/historyOrder', function(){
	return view('front_end/layout/historyOrder');
});