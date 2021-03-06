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

Route::middleware('auth:api')->get('series', 'SeriesController@index');
Route::middleware('auth:api')->get('series/{id}', 'SeriesController@show');
Route::middleware('auth:api')->post('series', 'SeriesController@store');
Route::middleware('auth:api')->put('series/{id}', 'SeriesController@update');
Route::middleware('auth:api')->delete('series/{id}', 'SeriesController@destroy');