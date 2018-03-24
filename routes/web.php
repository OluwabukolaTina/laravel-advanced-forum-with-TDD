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

Route::get('github/auth', [

		'uses' =>'SocialController@auth',

		'as' => 'social.auth'

]);

Route::get('github/redirect', [

		'uses' =>'SocialController@callback',

		'as' => 'social.callback'

]);

Route::post('login/custom', [

		'uses' =>'LoginController@login',

		'as' => 'login.custom'

]);

// Route::group(['middleware' => 'auth'], function(){

Route::resource('channels', 'ChannelsController');

// });

// Route::group(['middleware' => 'auth'], function(){
//
// 	Route::resource('channels', 'ChannelsController');
//
// });

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
