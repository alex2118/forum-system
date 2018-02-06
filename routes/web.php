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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('forums')->group(function() {
  Route::get('/', 'ForumsController@index')->name('forums.index');
  Route::get('/{forum}/{subforum}', 'SubforumsController@index')->name('subforums.index');
  Route::get('/{forum}/{subforum}/new-thread', 'ThreadsController@create')->name('thread.create');
  Route::post('/{forum}/{subforum}/new-thread', 'ThreadsController@store')->name('thread.store');
  Route::get('/{forum}/{subforum}/{thread}', 'ThreadsController@show')->name('thread.show');
  Route::get('/{forum}/{subforum}/{thread}/new-reply', 'RepliesController@create')->name('reply.create');
  Route::post('/{forum}/{subforum}/{thread}/new-reply', 'RepliesController@store')->name('reply.store');
});

Route::get('/settings', 'UsersController@settings')->name('user.settings');

Route::prefix('members')->group(function() {
  Route::get('/profile/{user}', 'UsersController@profile')->name('user.profile');
});
