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


Route::group(['middleware' => 'api'], function () {
    Route::get('temperature', [
        'uses' => 'ApiController@temperature'
    ]);

    Route::group(['prefix' => 'activity'], function () {
        Route::get('pump', [
           'uses' => 'ApiController@pumpActivity'
        ]);

        Route::get('heat', [
            'uses' => 'ApiController@heatActivity'
        ]);
    });

    Route::get('process', [
        'uses' => 'ApiController@currentProcess'
    ]);

    Route::get('process-name', [
        'uses' => 'ApiController@processName'
    ]);

    Route::get('heating-on', [
        'uses' => 'ApiController@heatingOn'
    ]);

    Route::get('heating-off', [
        'uses' => 'ApiController@heatingOff'
    ]);
});
