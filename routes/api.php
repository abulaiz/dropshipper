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
	Route::get('product/stock', 'ProductController@stock');
	Route::post('product/add', 'ProductController@add');
	Route::get('user/stock', 'UserStockController@index');

	Route::post('user/order/cancel', 'OrderProductController@cancel');
	Route::get('user/order', 'OrderProductController@progress');
	Route::post('user/order/history', 'OrderProductController@member_history');
	Route::get('user/historyOrder/{id}', 'OrderProductController@user_history');

	Route::get('user', 'UserController@show');
	Route::get('registrant', 'UserController@registrant');
	Route::post('activateUser', 'UserController@activate');
	Route::post('user/update_password', 'UserController@edit_password');
	Route::post('user/delete', 'UserController@delete');

	Route::post('checkProductAv', 'ProductController@checkAv');

	Route::post('member/sending', 'SendingController@memberRequest');
	Route::get('member/sending', 'SendingController@memberStatus');
	Route::get('admin/sending', 'SendingController@sendingRequest');
	Route::get('sending/detail/{id}', 'SendingController@detailRequest');
	Route::post('sending/cancel', 'SendingController@cancel');
	Route::post('sending/reject', 'SendingController@reject');
	Route::post('sending/priceUpdate', 'SendingController@pricing');
	Route::post('sending/changeStatus', 'SendingController@changeStatus');

	// Admin Route Area
	Route::get('admin/orderRequest', 'OrderProductController@request');
	Route::get('admin/orderDetail/{id}', 'OrderProductController@request_detail');
	Route::post('admin/order/confirm', 'OrderProductController@confirmOrder');
	Route::post('admin/order/reject', 'OrderProductController@rejectOrder');

	Route::get('/admin/badge', 'NotificationController@admin_badge');
	
	include 'api_mod/mail.php';
	include 'api_mod/ongkir.php';
});