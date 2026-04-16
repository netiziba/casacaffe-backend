<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MenuCategoryController;
use App\Http\Controllers\Api\MenuItemController;
use App\Http\Controllers\Api\SiteSettingController;
use App\Http\Controllers\Api\UploadController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/menu/categories', [MenuCategoryController::class, 'index']);
Route::get('/menu/categories/{id}', [MenuCategoryController::class, 'show']);
Route::get('/menu/items', [MenuItemController::class, 'index']);
Route::get('/settings', [SiteSettingController::class, 'index']);

// Protected routes (require Sanctum token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);

    // Admin: Menu Categories
    Route::post('/menu/categories', [MenuCategoryController::class, 'store']);
    Route::put('/menu/categories/{id}', [MenuCategoryController::class, 'update']);
    Route::delete('/menu/categories/{id}', [MenuCategoryController::class, 'destroy']);

    // Admin: Menu Items
    Route::post('/menu/items', [MenuItemController::class, 'store']);
    Route::put('/menu/items/{id}', [MenuItemController::class, 'update']);
    Route::delete('/menu/items/{id}', [MenuItemController::class, 'destroy']);

    // Admin: Site Settings
    Route::post('/settings', [SiteSettingController::class, 'upsert']);

    // Image upload
    Route::post('/upload', [UploadController::class, 'store']);
});
