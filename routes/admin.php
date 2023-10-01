<?php

use App\Exceptions\NotFoundHttpException;
use App\Http\Controllers\admin\UsersController;
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

Route::prefix('users')->middleware(['auth', 'role:super-user'])->group(function() {
    Route::post('all', [UsersController::class, 'getAll']);
});




Route::any('{any}', function(){
    throw new NotFoundHttpException(__('Page not found'));
})->where('any', '.*');
