<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BillboardController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\ClassificationProductController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
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
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    });
    Route::group(['prefix' => 'movies'], function () {
        Route::group(['prefix' => 'classification'], function () {
            Route::get('', [ClassificationController::class, 'index']);
        });
        Route::get('', [MovieController::class, 'index']);
        Route::post('', [MovieController::class, 'store']);
        Route::get('/{id}', [MovieController::class, 'show']);
        Route::post('/{id}', [MovieController::class, 'update']);
    });
    Route::group(['prefix' => 'products'], function () {
        Route::group(['prefix' => 'classification'], function () {
            Route::get('', [ClassificationProductController::class, 'index']);
            Route::get('/{id}', [ClassificationProductController::class, 'show']);
        });
        Route::group(['prefix' => 'types'], function () {
            Route::get('', [ProductTypeController::class, 'index']);
        });
        Route::get('', [ProductController::class, 'index']);
        Route::post('', [ProductController::class, 'store']);
        Route::get('/{id}', [ProductController::class, 'show']);
        Route::post('/{id}', [ProductController::class, 'update']);
    });
    Route::group(['prefix' => 'locations'], function () {
        Route::get('', [LocationController::class, 'index']);
    });
    Route::group(['prefix' => 'likes'], function () {
        Route::post('/{id}', [LikeController::class, 'store']);
    });
    Route::group(['prefix' => 'rating'], function () {
        Route::post('/{id}', [RatingController::class, 'store']);
    });
    Route::group(['prefix' => 'genres'], function () {
        Route::get('', [GenreController::class, 'index']);
    });
    Route::group(['prefix' => 'billboard'], function () {
        Route::get('', [BillboardController::class, 'index']);
        Route::post('', [BillboardController::class, 'store']);
        Route::get('/{id}', [BillboardController::class, 'show']);
        Route::post('/{id}', [BillboardController::class, 'update']);
        Route::get('/filter/{date}', [BillboardController::class, 'filter']);
    });
    Route::group(['prefix' => 'reservation'], function () {
        Route::get('', [ReservationController::class, 'index']);
        Route::post('', [ReservationController::class, 'store']);
        Route::get('/{id}', [ReservationController::class, 'show']);
    });

    Route::group(['prefix' => 'tickets'], function () {
        Route::get('', [TicketController::class, 'index']);
        Route::post('', [TicketController::class, 'store']);
        Route::get('/{id}', [TicketController::class, 'show']);
    });
});
