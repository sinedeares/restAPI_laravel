<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestAPI\UserController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/users', [UserController::class, 'getAll']);
Route::get('users/{id}', [UserController::class, 'get']);
Route::post('users', [UserController::class, 'create']);
Route::post('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}',[UserController::class, 'delete']);
