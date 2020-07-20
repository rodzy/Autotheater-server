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
        Route::post('/store', 'MovieController@store');
        Route::get('/popular','MovieController@popular');
        Route::get('/{id}', 'MovieController@show');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index');
        Route::post('/store', 'ProductController@store');
        Route::get('/{id}', 'ProductController@show');
        Route::patch('/{id}', 'ProductController@show');
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('', 'LocationController@index');
    });
    Route::group(['prefix' => 'likes'], function () {
        Route::get('', 'LikeController@index');
    });
    Route::group(['prefix' => 'genres'], function () {
        Route::get('', 'GenreController@index');
    });
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('', 'TicketController@index');
        Route::post('/store', 'TicketController@store');
        Route::get('/{id}', 'TicketController@show');

    });
});
