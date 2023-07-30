<?php

use App\Http\Controllers\UserController;
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


Route::post('/registration', [UserController::class, 'registration']);
Route::post('/login', [A::class, 'registration']);

Route::middleware('auth:sanctum')->get('/user', function () {
    Route::post('/profils', [UserController::class, 'addProfil']);
});
