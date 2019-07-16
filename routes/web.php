
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Composer
View::composer("*","App\Composers\BaseComposer");

Auth::routes(['reset' => false]);

// Route untuk semua jenis role yang telah login
Route::group(['middleware' => ['auth']], function () {
	// Root Home
	Route::get('/', 'InfoController@index');
	Route::get('/home', 'InfoController@index');	

	Route::get('/profile', 'UserController@profile');
	Route::post('/changePassword', 'UserController@update_password')->name('changePassword');
	Route::post('/changeInfo', 'UserController@update_info')->name('changeInfo');

	include('web_mod/email.php');

	// Route khusus untuk member
	Route::group(['middleware' => ['role:member']], function () {
		include('web_mod/member.php');
	});

	// Route khusus untuk admin dan superadmin
	Route::group(['middleware' => ['role:admin|superadmin']], function () {
		include('web_mod/admin.php');
	});

	// Route khusus untuk superadmin
	Route::group(['middleware' => ['role:superadmin']], function () {
		 include('web_mod/superadmin.php');
	});

	include 'web_mod/fileHandler.php';

	Route::get('tester', function(){
		return View('tester');
	});

});

// Route::get('tes', 'UserController@tes');
// Route::get('tes', function(){
// 	return View('emails.accountActivation');
// });