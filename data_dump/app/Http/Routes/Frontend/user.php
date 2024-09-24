<?php

Route::get('/login', [\App\Http\Controllers\UserDashboard::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/login', [\App\Http\Controllers\UserDashboard::class, 'loginAttempt'])->name('user.login');

Route::get('/dashboard', [\App\Http\Controllers\UserDashboard::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/my-generated-reports', [\App\Http\Controllers\UserDashboard::class, 'reports'])->name('user.mygeneratedreports')->middleware('auth');
Route::get('/my-receipts', [\App\Http\Controllers\UserDashboard::class, 'receipts'])->name('user.myreceipts')->middleware('auth');
Route::get('/generate-new-report', [\App\Http\Controllers\UserDashboard::class, 'generateReport'])->name('user.generatenewreport')->middleware('auth');
Route::post('/generate-new-report', [\App\Http\Controllers\UserDashboard::class, 'generateReportPost'])->name('user.generatenewreport')->middleware('auth');
Route::get('/my-profile-settings', [\App\Http\Controllers\UserDashboard::class, 'profile'])->name('user.myprofilesettings')->middleware('auth');
Route::post('/my-profile-settings', [\App\Http\Controllers\UserDashboard::class, 'profileUpdate'])->name('user.myprofilesettings')->middleware('auth');
Route::get('/changepassword', [\App\Http\Controllers\UserDashboard::class, 'changepassword'])->name('user.changepassword')->middleware('auth');
Route::post('/changepassword', [\App\Http\Controllers\UserDashboard::class, 'changepasswordUpdate'])->name('user.changepassword')->middleware('auth');
Route::get('/logout', [\App\Http\Controllers\UserDashboard::class, 'logout'])->name('user.logout')->middleware('auth');