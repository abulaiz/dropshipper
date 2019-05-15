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

	Route::post('checkProductAv', 'ProductController@checkAv');

	Route::post('order/historyAll', 'HistoryAllController@index');
	include 'api_mod/mail.php';
});