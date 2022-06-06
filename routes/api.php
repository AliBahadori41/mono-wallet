<?php

use App\Http\Controllers\Api\User\PromotionController;
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
    'prefix' => 'backoffice'
], function() {
    Route::apiResource('promotion-codes', PromotionController::class)->only(['index', 'show', 'store']);
});
