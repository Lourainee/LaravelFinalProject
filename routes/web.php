<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

// Public routes
Route::redirect('/', '/login');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Tasks
    Route::resource('tasks', TaskController::class);
    Route::post('tasks/{task}/toggle-status', [TaskController::class, 'toggleStatus'])->name('tasks.toggle-status');

    // Categories
    Route::resource('categories', CategoryController::class);
});

// Breeze comes with its own auth routes
require __DIR__.'/auth.php';
