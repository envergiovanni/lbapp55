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

Route::get('/', 'PagesController@home')->name('page.home');
Route::get('/nosotros', 'PagesController@about')->name('page.about');
Route::get('/contacto', 'PagesController@contact')->name('page.contact');
Route::post('/contacto', 'PagesController@sendContactForm')->name('send.contact.form');
Route::get('/entrada/{post}', 'PagesController@show')->name('page.post');
Route::get('/categoria/{category}', 'PagesController@category')->name('page.category');
Route::get('/etiqueta/{tag}', 'PagesController@tag')->name('page.tag');

Route::feeds();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::resource('posts', 'PostsController', ['as' => 'admin']);
	Route::post('posts/{post}/images', 'ImagesController@store')->name('admin.post.images.store');
	Route::delete('images/{image}', 'ImagesController@destroy')->name('admin.images.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
