<?php 

Route::post('fileUpload', 'FileController@upload');
Route::get('resiPengiriman/{id}', ['as' => 'my_file', 'uses' => 'FileController@dummyPDF' ]);
Route::get('sendingAttachment/{id}/{filename}', 'FileController@sendingAttachment');
Route::get('mailAttachment/{owner_id}/{tagged_id}/{filename}', 'FileController@mailAttachment');