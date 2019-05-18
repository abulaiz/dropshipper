<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth']], function () {
	Route::get('product/available', 'ProductController@available');
	Route::get('user/stock', 'UserStockController@index');

	Route::post('user/order/cancel', 'OrderProductController@cancel');
	Route::get('user/order', 'OrderProductController@progress');

	Route::get('user/order/history', 'OrderProductController@member_history');
	Route::post('user/order/history', 'OrderProductController@member_history');

	Route::post('checkProductAv', 'ProductController@checkAv');
	
	include 'api_mod/mail.php';
});