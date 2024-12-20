<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\DosenController;
use App\Http\Controllers\Api\MakulController;

// Authentication Routes
// Authentication Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Protecting Routes with Sanctum Middleware
Route::middleware('auth:sanctum')->group(function () {
    // User Info Route
    Route::get('/user', function (Request $request) {
        return $request->user(); // Get the authenticated user's info
    });

    // CRUD Routes for Mahasiswa
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/read/{id}', [MahasiswaController::class, 'read']);
    Route::get('/mahasiswa/all', [MahasiswaController::class, 'all']);
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

    // CRUD Routes for Dosen
    Route::post('/dosen/create', [DosenController::class, 'create']);
    Route::get('/dosen/read/{id}', [DosenController::class, 'read']);
    Route::get('/dosen/all', [DosenController::class, 'all']);
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

    // CRUD Routes for Makul
    Route::post('/makul/create', [MakulController::class, 'create']);
    Route::get('/makul/read/{id}', [MakulController::class, 'read']);
    Route::get('/makul/all', [MakulController::class, 'all']);
    Route::put('/makul/update/{id}', [MakulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MakulController::class, 'delete']);
});