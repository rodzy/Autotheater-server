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
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });
    Route::group(['prefix' => 'movies'], function () {
        Route::group(['prefix' => 'classification'], function () {
            Route::get('', 'ClassificationController@index');
        });
        Route::get('', 'MovieController@index');
        Route::post('', 'MovieController@store');
        Route::get('/{id}', 'MovieController@show');
        Route::post('/{id}', 'MovieController@update');
    });
    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'classification'], function () {
            Route::get('', 'ClassificationProductController@index');
        });
        Route::group(['prefix' => 'types'], function () {
            Route::get('', 'ProductTypeController@index');
        });
        Route::get('', 'ProductController@index');
        Route::post('', 'ProductController@store');
        Route::get('/{id}', 'ProductController@show');
        Route::post('/{id}', 'ProductController@update');
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('', 'LocationController@index');
    });
    Route::group(['prefix' => 'likes'], function () {
        Route::post('/{id}', 'LikeController@store');
    });
    Route::group(['prefix' => 'rating'], function () {
        Route::post('/{id}', 'RatingController@store');
    });
    Route::group(['prefix' => 'genres'], function () {
        Route::get('', 'GenreController@index');
    });
    Route::group(['prefix' => 'billboard'], function () {
        Route::get('','BillboardController@index');
        Route::post('','BillboardController@store');
        Route::get('/{id}','BillboardController@show');
        Route::get('/filter/{date}','BillboardController@filter');
    });
    Route::group(['prefix' => 'reservation'], function () {
        Route::get('','ReservationController@index');
        Route::post('','ReservationController@store');
        Route::get('/{id}','ReservationController@show');
    });

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('', 'TicketController@index');
        Route::post('', 'TicketController@store');
        Route::get('/{id}', 'TicketController@show');
    });
});
