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

Route::prefix('/')->group(function(){
	Route::get('', 'LoginController@showForm')->name('login');
	Route::post('login', 'LoginController@login')->name('login');

	Route::post('logout', 'LoginController@logout')->name('login');
	Route::get('logout', 'LoginController@logout')->name('login');

	Route::get('profile', 'Admin\LoginController@profile')->name('profile');


	Route::get('dashboard', 'LoginController@dashboard')->middleware('auth:users')->name('dashboard');
	Route::get('viewfile/{itemId?}', 'LoginController@viewfile')->middleware('auth:users')->name('dashboard');

	Route::prefix('/_admin')->group(function(){
		Route::get('', 'Admin\LoginController@showForm')->name('login');
		Route::post('', 'Admin\LoginController@login')->name('login');

		Route::post('logout', 'Admin\LoginController@logout')->name('login');
		Route::get('logout', 'Admin\LoginController@logout')->name('login');

		Route::get('dashboard', 'Admin\LoginController@dashboard')->middleware('auth:admin')->name('dashboard');
		Route::get('profile', 'Admin\LoginController@profile')->middleware('auth:admin')->name('profile');

		Route::prefix('admin')->middleware('auth:admin')->name('admin')->group(function(){
			Route::get('', 'Admin\AdminController@index');
			Route::get('/add', 'Admin\AdminController@showForm');
			Route::post('/add', 'Admin\AdminController@addItem');

			Route::get('/edit/{itemId}', 'Admin\AdminController@showForm');
			Route::post('/edit', 'Admin\AdminController@editItem');

			Route::post('/delete', 'Admin\AdminController@deleteItem');
		});
		
		Route::prefix('user')->middleware('auth:admin')->name('user')->group(function(){
			Route::get('', 'Admin\UsersController@index');
			Route::get('/add', 'Admin\UsersController@showForm');
			Route::post('/add', 'Admin\UsersController@addItem');

			Route::get('/edit/{itemId}', 'Admin\UsersController@showForm');
			Route::post('/edit', 'Admin\UsersController@editItem');

			Route::post('/delete', 'Admin\UsersController@deleteItem');
		});

		Route::prefix('files')->middleware('auth:admin')->name('files')->group(function(){
			Route::get('', 'Admin\FilesController@index');
			Route::get('/add', 'Admin\FilesController@showForm');
			Route::post('/add', 'Admin\FilesController@addItem');

			Route::get('/edit/{itemId}', 'Admin\FilesController@showForm');
			Route::post('/edit', 'Admin\FilesController@editItem');

			Route::get('/stats/{itemId}', 'Admin\FilesController@stats');

			Route::post('/delete', 'Admin\FilesController@deleteItem');
		});

	});	
});