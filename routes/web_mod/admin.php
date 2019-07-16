<?php 

Route::post('info/store', 'InfoController@store');
Route::post('info/delete', 'InfoController@delete');

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

Route::get('/stokBarang/print', 'ProductController@print_stock');

