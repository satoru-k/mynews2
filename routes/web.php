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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', 'Admin\NewsController@add');           //追記10
    Route::post('news/create', 'Admin\NewsController@create');       //追記14
    Route::get('news', 'Admin\NewsController@index');                //追記16
    Route::get('news/edit', 'Admin\NewsController@edit');            //追記17
    Route::post('news/edit', 'Admin\NewsController@update');         //追記17
    Route::get('news/delete', 'Admin\NewsController@delete');        //追記17
    Route::get('profile/create', 'Admin\ProfileController@add');     //課題10
    Route::post('profile/create', 'Admin\ProfileController@create'); //課題14
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/edit', 'Admin\ProfileController@edit');      //課題10
    Route::post('profile/edit', 'Admin\ProfileController@update');   //課題14
    Route::get('profile/delete', 'Admin\ProfileController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'NewsController@index');
