<?php 

Route::get('ongkir/province', 'RajaOngkirController@province');
Route::get('ongkir/city/{province_id}', 'RajaOngkirController@city');
Route::get('ongkir/subdistrict/{city_id}', 'RajaOngkirController@subdistrict');
Route::get('ongkir/international', 'RajaOngkirController@international');
Route::post('ongkir/price', 'RajaOngkirController@getPrice');