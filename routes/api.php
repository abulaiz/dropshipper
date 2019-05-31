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

	// Member Route Area
	Route::get('product/available', 'ProductController@available');
	Route::get('user/stock', 'UserStockController@index');

	Route::post('user/order/cancel', 'OrderProductController@cancel');
	Route::get('user/order', 'OrderProductController@progress');
	Route::post('user/order/history', 'OrderProductController@member_history');

	Route::post('checkProductAv', 'ProductController@checkAv');

	Route::post('member/sending', 'SendingController@memberRequest');
	Route::get('member/sending', 'SendingController@memberStatus');
	Route::get('admin/sending', 'SendingController@sendingRequest');
	Route::get('sending/detail/{id}', 'SendingController@detailRequest');
	Route::post('sending/cancel', 'SendingController@reject');
	Route::post('sending/priceUpdate', 'SendingController@pricing');
	Route::post('sending/changeStatus', 'SendingController@changeStatus');

	// Admin Route Area
	Route::get('admin/orderRequest', 'OrderProductController@request');
	Route::get('admin/orderDetail/{id}', 'OrderProductController@request_detail');
	Route::post('admin/order/confirm', 'OrderProductController@confirmOrder');
	Route::post('admin/order/reject', 'OrderProductController@rejectOrder');
	
	include 'api_mod/mail.php';
});