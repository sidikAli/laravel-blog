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
Auth::routes();

Route::get('/', 'BlogController@index')->name('blog.index');
Route::get('/page/{slug}', 'BlogController@page')->name('blog.page');
Route::get('/kategori/{category}', 'BlogController@category')->name('blog.category');
Route::get('/search/', 'BlogController@search')->name('blog.search');
Route::get('/tag/{tag}', 'BlogController@tag')->name('blog.tag');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {

	Route::get('/', 'HomeController@index')->name('admin.home');

	Route::get('/post/trashed', 'PostController@trash')->name('post.trash');
	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');

	Route::resource('category', 'CategoryController');
	Route::resource('tag', 'TagController');
	Route::resource('post', 'PostController');
	Route::resource('user', 'UserController');

	
});

