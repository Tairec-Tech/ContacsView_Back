?<?php
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


// Rutas públicas
Route::post('/users', [UserController::class, 'store']); // registro
Route::get('/users', [UserController::class, 'index']); // listar usuarios
Route::post('/login', [AuthController::class, 'login']); // login

// Rutas protegidas con token
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::post('/contacts', [ContactController::class, 'store']);
    Route::get('/contacts/{id}', [ContactController::class, 'show']);
    Route::put('/contacts/{id}', [ContactController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);


    // Users
    Route::put('/users/{id}', [UserController::class, 'update']);
});

Route::post('/logout', [AuthController::class, 'logout']);
