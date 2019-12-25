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

/* Routes for public */
Route::get('/', 'ArticlesController@show');
Route::get('article/{id}', 'ArticlesController@showarticle');

/* Routes for admin access */
Route::group(['prefix' => 'admin'],function(){
  Auth::routes(['register' => false]);
  Route::get('/new', 'ArticlesController@addForm')->middleware('auth');
  Route::post('/save', 'ArticlesController@save')->middleware('auth');
  Route::get('/index', 'ArticlesController@index')->middleware('auth');
  Route::get('edit/{id}', 'ArticlesController@edit')->middleware('auth');
  Route::put('update/{id}', 'ArticlesController@update')->middleware('auth');
  Route::get('delete/{id}', 'ArticlesController@delete')->middleware('auth');
});
