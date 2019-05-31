<?php 

Route::post('fileUpload', 'FileController@upload');
Route::get('/sample-pdf', ['as' => 'my_file', 'uses' => 'FileController@dummyPDF' ]);
Route::get('sendingAttachment/{id}/{filename}', 'FileController@sendingAttachment');