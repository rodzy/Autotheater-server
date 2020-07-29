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
        Route::post('', 'MovieController@store');
        Route::get('/{id}', 'MovieController@show');
        Route::post('/{id}', 'MovieController@update');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('', 'ProductController@index');
        Route::post('', 'ProductController@store');
        Route::get('/{id}', 'ProductController@show');
        Route::post('/{id}', 'ProductController@update');
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('', 'LocationController@index');
    });
    Route::group(['prefix' => 'likes'], function () {
        Route::get('/{id}', 'LikeController@store');
    });
    Route::group(['prefix' => 'rating'], function () {
        Route::get('/{id}', 'RatingController@store');
    });
    Route::group(['prefix' => 'genres'], function () {
        Route::get('', 'GenreController@index');
    });
    Route::group(['prefix' => 'tickets'], function () {
        Route::get('', 'TicketController@index');
        Route::post('', 'TicketController@store');
        Route::get('/{id}', 'TicketController@show');
    });
});
