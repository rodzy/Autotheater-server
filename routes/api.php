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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'movies'], function () {
        Route::group(['prefix' => 'auth'], function ($router) {
            Route::post('register', 'AuthController@register');
            Route::post('login', 'AuthController@login');
            Route::post('logout', 'AuthController@logout');
            Route::post('refresh', 'AuthController@refresh');
            Route::post('me', 'AuthController@me');
        });
        Route::get('', 'MovieController@index');
        Route::get('all', 'MovieController@all');
        Route::get('/{id}', 'MovieController@show');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index');
        Route::get('/{id}', 'ProductController@show');
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('', 'LocationController@index');
    });
    Route::group(['prefix' => 'genres'], function () {
        Route::get('', 'GenreController@index');
    });
});
