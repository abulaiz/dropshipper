<?php 
Route::get('unread_inbox', 'NotificationController@unread_inbox');
Route::post('mail', 'MailController@index');
Route::post('mail/read', 'MailController@read');
Route::post('mail/write', 'MailController@write')->middleware('XSS');