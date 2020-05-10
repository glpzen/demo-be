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


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('register', [ 'as' => 'register', 'uses' => 'Auth\AuthController@register']);
    Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@login']);
});


Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'auth'
], function ($router) {
    Route::post('logout', [ 'as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::get('me', 'Auth\AuthController@me');
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'guardians'
], function ($router) {
    Route::get('/', 'GuardianController@index');
});