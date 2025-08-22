<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function (): void {
    // Authentication routes with rate limiting
    Route::prefix('auth')->middleware('throttle:auth')->group(function (): void {
        // These routes will be implemented in M3
        // Route::post('/register', [AuthController::class, 'register']);
        // Route::post('/login', [AuthController::class, 'login']);
        // Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
        // Route::post('/token', [AuthController::class, 'createToken'])->middleware('auth:sanctum');
        // Route::delete('/token/{id}', [AuthController::class, 'revokeToken'])->middleware('auth:sanctum');
    });

    // Protected routes
    Route::middleware('auth:sanctum')->group(function (): void {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});