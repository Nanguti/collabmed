<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use App\Http\Controllers\OrganizationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('todos', TodoController::class);
Route::apiResource('ogarnizations', OrganizationController::class);
// Route::post('updat', OrganizationController::class);