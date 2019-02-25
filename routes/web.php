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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/post/store_comment', 'PostController@store_comment');
//Route::post('/comment', 'CommentController@store');
Route::post('comments/{post}',  [
    'as' => 'comments.store',
    'uses' => 'CommentController@store'
]);
//Route::get('user/{name?}'

Route::group(['middleware' => ['auth:web']], function () {
    Route::resource('post', 'PostController');
    Route::resource('comment', 'CommentController');
    Route::post('/comment/{post}',  [
        'as' => 'comment.store',
        'uses' => 'CommentController@store'
    ]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
