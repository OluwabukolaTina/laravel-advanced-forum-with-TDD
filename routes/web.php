<?php

Route::get('/', function () {
   
    return view('forum');

});

// Route::get('github/auth', [

// 		'uses' =>'SocialController@auth',

// 		'as' => 'social.auth'

// ]);

// Route::get('github/redirect', [

// 		'uses' =>'SocialController@callback',

// 		'as' => 'social.callback'

// ]);

Route::post('login/custom', [

		'uses' =>'LoginController@login',

		'as' => 'login.custom'

]);

Route::get('github/auth', 'LoginController@redirectToProvider');

Route::get('github/redirect', 'LoginController@handleProviderCallback');

// Route::group(['middleware' => 'auth'], function(){

Route::resource('channels', 'ChannelsController');

Route::get('/discussion/create', 'DiscussionsController@create')->name('discussions.create');

Route::post('/discussion/store', 'DiscussionsController@store')->name('discussions.store');

Route::get('discussion/{slug}', 'DiscussionsController@show')->name('discussion');

Route::post('discussion/reply/{id}', 'RepliesController@reply')->name('discussion.reply');

Route::get('reply/like/{id}', 'LikesController@like')->name('reply.like');

Route::get('reply/unlike/{id}', 'LikesController@unlike')->name('reply.unlike');

Route::get('/discussion/watch/{id}', 'WatchersController@watch')->name('discussion.watch');

Route::get('/discussion/unwatch/{id}', 'WatchersController@unwatch')->name('discussion.unwatch');
// });

// Route::group(['middleware' => 'auth'], function(){
//
// 	Route::resource('channels', 'ChannelsController');
//
// });

Auth::routes();

Route::get('/forum', 'ForumsController@index')->name('forum');

Route::get('/channel/{slug}', 'ForumsController@channel')->name('channel');
