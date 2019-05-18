<?php 

// Menu admin Member
Route::get('/prosesAlamat', function () {
    return view('front_end/layout/admin/prosesAlamat');
});

Route::get('/stokProduk', function(){
	return view('front_end/layout/admin/stokProduk');
});
