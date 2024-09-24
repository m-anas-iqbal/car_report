<?php
use App\Http\Controllers\Admin\AuthController;
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');