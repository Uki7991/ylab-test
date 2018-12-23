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

Route::get('/', 'HomeController@home')->name('home');

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'HomeController@index')->name('admin');

    Route::resource('status', 'StatusController');
    Route::resource('task', 'TaskController');

    //User routes
    Route::get('user', 'UserController@index')->name('user.index');
    Route::delete('user/{user}', 'UserController@destroy')->name('user.destroy');
    Route::put('user/{user}', 'UserController@update')->name('user.update');
    Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit');
});

Route::resource('status', 'StatusController')->only([
    'show',
]);
Route::resource('task', 'TaskController')->only([
    'show', 'update'
]);
