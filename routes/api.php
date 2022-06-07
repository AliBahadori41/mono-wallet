<?php

use App\Http\Controllers\Api\Backoffice\PromotionController;
use App\Http\Controllers\Api\User\UserController;
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

Route::post('user/login', [UserController::class, 'login']);

Route::post('use-promotion', [UserController::class, 'usePromotion'])->middleware(['auth:sanctum']);

Route::post('backoffice/assign-promotion/{promotion_code:code}/user/{user}', [PromotionController::class, 'assignPromotion']);
Route::apiResource('backoffice/promotion-codes', PromotionController::class)->only(['index', 'show', 'store']);
