<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('subscriptions')->group(function() {
    Route::get('', [SubscriptionController::class, 'index']);
    Route::post('', [SubscriptionController::class, 'store']);
});

Route::prefix('posts')->group(function() {
    Route::get('', [PostController::class, 'index']);
    Route::post('', [PostController::class, 'store']);
});

Route::prefix('users')->group(function() {
    Route::get('', [UserController::class, 'index']);
    Route::post('', [UserController::class, 'store']);
});

Route::prefix('websites')->group(function() {
    Route::get('', [WebsiteController::class, 'index']);
    Route::post('', [WebsiteController::class, 'store']);
});
