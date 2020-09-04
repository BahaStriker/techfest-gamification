<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('search/games', 'API\SearchController@show');
Route::apiResources(['games' => 'API\GameController']);
Route::post('score/{game}/{score}/{id}', 'API\GameController@score');
Route::get('/user/score/{game}/{id}', 'API\GameController@getscore');
Route::get('/ranking', 'API\GameController@ranking');
