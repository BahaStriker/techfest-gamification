<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/event', function () {
    broadcast(new \App\Events\NewMessage('hello master'));

    return 'broadcasted';
});
Route::get('{any}', 'AppController@index')->where('any', '.*');
