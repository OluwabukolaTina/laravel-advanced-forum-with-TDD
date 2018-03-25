<?php

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

Route::get('/discussion/create', [

	'uses' => 'DiscussionsController@create',

	'as' => 'discussions.create'

]);

Route::post('/discussion/store', [

	'uses' => 'DiscussionsController@store',

	'as' => 'discussions.store'

]);

Route::get('discussion/{slug}', [

	'uses' => 'DiscussionsController@show',

	'as' => 'discussion'

]);

// });

// Route::group(['middleware' => 'auth'], function(){
//
// 	Route::resource('channels', 'ChannelsController');
//
// });

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
