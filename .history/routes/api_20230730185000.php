<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
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


Route::post('/registration', [AuthController::class, 'registration']);
Route::post('/login', [AuthController::class, 'login']);

// Routes Protégées
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/profils', [ProfilController::class, 'addProfil']);
    Route::post('/profil', [ProfilController::class, 'addProfil']);
    Route::get('/users', [UserController::class, 'show']);
});
