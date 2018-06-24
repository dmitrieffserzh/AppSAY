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


// FRONTEND ==========================================================================================================//
Auth::routes();
Route::get('/',                                   [ 'as' => 'home',           'uses' => 'HomeController@index' ]);


// TAGS
Route::get('news/tag/{slug}',                  [ 'as' => 'news.tag',       'uses' => 'TagController@index' ]);


// NEWS
Route::group([
	'prefix'        => 'news'],
	function() {
        Route::get('/',                           [ 'as' => 'news.index',     'uses' => 'NewsController@index' ]);
		Route::get('{category_slug}',             [ 'as' => 'news.category',  'uses' => 'CategoryController@index' ]);
		Route::get('{category_slug}/{slug}',      [ 'as' => 'news.show',      'uses' => 'NewsController@show' ]);
		});

// USERS
Route::get('users',                               [ 'as' => 'users.list',     'uses' => 'NewsController@index' ]);


// ADMIN PANEL =======================================================================================================//
Route::group([
	'namespace'     => 'Admin',
	'prefix'        => 'admin',
	'name'          => 'admin',
	/*'middleware'    => ['auth']*/],
	function() {
		Route::resource('news',       'NewsController',     [ 'as' => 'admin' ]);
		Route::resource('stories',    'StoryController',    [ 'as' => 'admin' ]);
		Route::resource('pages',      'PageController',     [ 'as' => 'admin' ]);
		Route::resource('comments',   'CommentController',  [ 'as' => 'admin' ]);
		Route::resource('categories', 'CategoryController', [ 'as' => 'admin' ]);
		Route::resource('tags',       'TagController',      [ 'as' => 'admin' ]);
		Route::resource('users',      'UserController',     [ 'as' => 'admin' ]);
		Route::resource('roles',      'RoleController',     [ 'as' => 'admin' ]);
		Route::get     ('/',          [ 'as' => 'admin.dashboard',    'uses' => 'AdminController@index' ]);
	});