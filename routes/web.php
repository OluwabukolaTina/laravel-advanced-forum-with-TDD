<?php

Route::get('/', function () {
   
    return view('forum');

});

Route::post('login/custom', [

		'uses' =>'LoginController@login',

		'as' => 'login.custom'

]);

Route::get('{provider}/auth', 'LoginController@redirectToProvider');

Route::get('{provider}/redirect', 'LoginController@handleProviderCallback');

// Route::group(['middleware' => 'auth'], function(){

Route::resource('channels', 'ChannelsController');

Route::get('/discussion/create', 'DiscussionsController@create')->name('discussions.create');

Route::post('/discussion/store', 'DiscussionsController@store')->name('discussions.store');

Route::get('/discussion/edit/{slug}', 'DiscussionsController@edit')->name('discussion.edit');

Route::post('/discussion/update/{id}', 'DiscussionsController@update')->name('discussion.update');

Route::get('discussion/{slug}', 'DiscussionsController@show')->name('discussion');

Route::post('discussion/reply/{id}', 'RepliesController@reply')->name('discussion.reply');

Route::get('reply/like/{id}', 'LikesController@like')->name('reply.like');

Route::get('reply/unlike/{id}', 'LikesController@unlike')->name('reply.unlike');

Route::get('/discussion/watch/{id}', 'WatchersController@watch')->name('discussion.watch');

Route::get('/discussion/unwatch/{id}', 'WatchersController@unwatch')->name('discussion.unwatch');

Route::get('/discussion/best/reply/{id}', 'RepliesController@bestAnswer')->name('reply.best');


Auth::routes();

Route::get('/forum', 'ForumsController@index')->name('forum');

Route::get('/channel/{slug}', 'ForumsController@channel')->name('channel');
