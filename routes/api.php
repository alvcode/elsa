<?php

use App\Exceptions\NotFoundHttpException;
use App\Http\Controllers\v1\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('auth')->group(function() {
    Route::post('email/register', [AuthController::class, 'registerByEmail']);
    Route::post('email/confirm', [AuthController::class, 'confirmEmail']);
    
    Route::post('email/login', [AuthController::class, 'loginEmail']);
    Route::post('token/refresh', [AuthController::class, 'refreshToken']);
    Route::post('email/forgot', [AuthController::class, 'forgotEmail']);
    Route::post('password/reset', [AuthController::class, 'resetPassword']);
    Route::post('email/confirm/repeat-code', [AuthController::class, 'repeatConfirmEmailCode']);
    Route::post('phone/call', [AuthController::class, 'phoneCall']);
    Route::post('phone/login', [AuthController::class, 'phoneLogin']);
});




Route::any('{any}', function(){
    throw new NotFoundHttpException(__('Page not found'));
})->where('any', '.*');
