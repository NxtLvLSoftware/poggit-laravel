<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'webhook', 'as' => 'webhook.'], function () {
    Route::group(['prefix' => 'github', 'as' => 'github'], function () {
        Route::post('/', function (Request $request) {
            Log::debug($request);
        });
    });

});
