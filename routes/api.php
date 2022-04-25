<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeliveryController;
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

Route::group(['prefix' => 'auth'], function(){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix' => '/deliveries'], function(){
    Route::get('/', [DeliveryController::class, 'index']);
    Route::post('/' , [DeliveryController::class, 'store']);
    Route::get('/{delivery}' , [DeliveryController::class, 'show']);
    Route::group(['prefix' => '/{delivery}'], function(){
        Route::patch('/', [DeliveryController::class, 'update']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


