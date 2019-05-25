
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

Auth::routes();

// Route untuk semua jenis role yang telah login
Route::group(['middleware' => ['auth']], function () {
	// Root Home
	Route::get('/', function () {
	    return view('front_end.layout.home');
	});

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

	Route::get('tester', function(){
		return View('tester');
	});
});




