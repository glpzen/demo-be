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
], function ($router) {
    Route::post('/auth/login', [ 'as' => 'login', 'uses' => 'Auth\AuthController@login']);
    Route::post('/guardians', [ 'as' => 'guardians.store', 'uses' => 'GuardianController@store']);
});

Route::group([
    'middleware' => 'jwt.auth'
], function ($router) {

    Route::post('/auth/logout', [ 'as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::post('/auth/refresh', 'Auth\AuthController@refresh');
    Route::get('/auth/me', 'Auth\AuthController@me');

    Route::get('/guardians', [ 'as' => 'guardians.index', 'uses' => 'GuardianController@index']);
    Route::patch('/guardians/{id}', [ 'as' => 'guardians.update', 'uses' => 'GuardianController@update']);

    Route::get('/students', [ 'as' => 'students.index', 'uses' => 'StudentController@index']);
    Route::get('/students/{id}/guardians', [ 'as' => 'students.index', 'uses' => 'StudentController@getGuardian']);
});