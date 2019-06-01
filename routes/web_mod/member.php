<?php 

// Menu Order Member
Route::get('/order', function () {
    return view('front_end/layout/member/order');
});

Route::post('/order/store', 'OrderProductController@store')->name('orderStock');

Route::get('/historyOrder', function(){
	return view('front_end/layout/member/historyOrder');
});

Route::get('/inputPengiriman', function(){
	return view('front_end/layout/member/pengiriman');
});

Route::get('/member/pengiriman', function(){
	return view('front_end/layout/member/statusPengiriman');
});