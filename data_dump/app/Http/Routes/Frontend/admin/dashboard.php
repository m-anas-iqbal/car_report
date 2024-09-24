<?php
Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index')->middleware(['adminauth']);
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        // Matches The "/admin/users" URL
    });
});