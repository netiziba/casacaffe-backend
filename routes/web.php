<?php

use Illuminate\Support\Facades\Route;

// API-only deploy: avoid default welcome view + session-heavy page on Railway root.
Route::get('/', function () {
    return response()->json([
        'name' => config('app.name'),
        'message' => 'API is running. Use routes under /api',
        'health' => url('/up'),
    ]);
});
