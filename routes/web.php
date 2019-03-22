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

Route::get('/', 'HomeController@index')->name('home');

//auth
Route::group(['prefix' => 'auth', 'as' => 'auth.', 'namespace' => 'Auth'], function () {
    //logout
    Route::post('/logout', 'LoginController@logout')->name('logout');

    //github oath
    Route::group(['prefix' => 'github', 'as' => 'github'], function () {
        Route::get('/', 'LoginController@redirectToProvider');
        Route::get('callback', 'LoginController@githubCallback')->name('.callback');
    });
});

//releases
Route::group(['as' => 'releases'], function () {
    Route::get('releases', 'ReleasesController@index');
});
