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
Route::resource('admin', 'Admin\AdminController');
Route::resource('user', 'User\UserController');
Route::get('/home', 'HomeController@index');
Route::resource('articles', 'Article\ArticlesController');
Route::resource('comments', 'Comment\CommentsController');
