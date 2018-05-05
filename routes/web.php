<?php

Auth::routes();

Route::get('/', function () {
    return redirect('/threads');
});

Route::name('auth.github')->get('auth/github','SocialAuthController@redirectToGithub');

Route::name('auth.github.callback')->get('auth/github/callback', 'SocialAuthController@handleGithubCallback');

Route::get('/threads', 'ThreadsController@index');

Route::get('/threads/create', 'ThreadsController@create');

Route::get('/threads/{channel}/{thread}', 'ThreadsController@show');

Route::post('/threads', 'ThreadsController@store');

Route::get('/threads/{channel}', 'ThreadsController@index');

Route::post('/threads/{channel}/{thread}/replies', 'RepliesController@store');

Route::post('/replies/{reply}/favorites', 'FavoritesController@store');

Route::name('profile')->get('/profiles/{user}', 'ProfilesController@show');
