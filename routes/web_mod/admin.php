<?php 

// Menu admin Member
Route::get('/orderRequest', function () {
    return view('front_end/layout/admin/orderRequest');
});

Route::get('/prosesAlamat', function () {
    return view('front_end/layout/admin/prosesAlamat');
});

Route::get('/stokBarang', function(){
	return view('front_end/layout/admin/stokBarang');
});

Route::get('/detailProduk', function(){
	return view('front_end/layout/admin/detailProduk');
});

