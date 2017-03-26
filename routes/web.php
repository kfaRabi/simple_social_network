<?php


Route::get('/', 'PostsController@index')->name('home');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/delete', 'PostsController@destroy');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::post('/posts/{post}/update', 'PostsController@update');

Route::get('/all-posts', 'PostsController@getAllPosts');
// Route::get('/all-posts', function(){
// 	return ['A', 'BB', 'CCC'];
// });


Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');



Route::get('/about', function () {
    return view('about');
});
