<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('uus');
Route::get('/reports', [DashboardController::class, 'reports'])->name('reports')->middleware('uus');
Route::get('/reports/{vin}', [DashboardController::class, 'reportsVinTest'])->name('reports-test')->middleware('uus');

Route::get("decline-receipt/{id}",[DashboardController::class, 'declineReceipt'])->middleware('uus');
Route::get("approve-receipt/{id}",[DashboardController::class, 'approveReceipt'])->middleware('uus');
Route::get("send-invoice/{id}",[DashboardController::class, 'sendInvoice'])->middleware('uus'); // copy

Route::post("edit-bank-account/{id}",[DashboardController::class, 'updateBankAccount'])->middleware('uus');
Route::get("edit-bank-account/{id}",[DashboardController::class, 'editBankAccount'])->middleware('uus');
Route::get("delete-bank-account/{id}",[DashboardController::class, 'deleteBankAccount'])->middleware('uus');
Route::post("add-bank-account",[DashboardController::class, 'insertBankAccount'])->middleware('uus');
Route::get("add-bank-account",[DashboardController::class, 'addBankAccount'])->middleware('uus');
Route::get("manage-bank-accounts",[DashboardController::class, 'manageBankAccounts'])->middleware('uus');
Route::post("authorizeNet-gateway-settings",[DashboardController::class, 'updateAuthorizeNetGatewaySettings'])->middleware('uus');
Route::get("authorizeNet-gateway-settings",[DashboardController::class, 'authorizeNetGatewaySettings'])->middleware('uus');

Route::post("paytabs-gateway-settings",[DashboardController::class, 'updatePaytabsGatewaySettings'])->middleware('uus');
Route::get("paytabs-gateway-settings",[DashboardController::class, 'paytabsGatewaySettings'])->middleware('uus');

Route::get("coinremitter-gateway-settings",[DashboardController::class, 'coinremitterGatewaySettings'])->middleware('uus');
Route::post("add-coinremitter-wallet",[DashboardController::class, 'storeCoinremitterWallet'])->middleware('uus');
Route::get("delete-coinremitter-wallet/{id}",[DashboardController::class, 'deleteCoinremitterWallet'])->middleware('uus');
Route::get("edit-coinremitter-wallet/{id}",[DashboardController::class, 'editCoinremitterWallet'])->middleware('uus');
Route::post("edit-coinremitter-wallet/{id}",[DashboardController::class, 'updateCoinremitterWallet'])->middleware('uus');
Route::get('/receipts', [DashboardController::class, 'receipts'])->name('receipts')->middleware('uus');
Route::get('/users', [DashboardController::class, 'users'])->name('users')->middleware('uus');
Route::get('/send_report', [DashboardController::class, 'send_report'])->name('send_report')->middleware('uus');
Route::get('/test_report', [DashboardController::class, 'test_report'])->name('test_report')->middleware('uus');
Route::post('/send_report', [DashboardController::class, 'send_report_email'])->name('send_report')->middleware('uus');
Route::get('/settings', [SettingsController::class, 'settings'])->name('settings')->middleware('uus');
Route::post('/settings', [SettingsController::class, 'updateSettings'])->name('settings')->middleware('uus');
Route::get('/checkvin', [SettingsController::class, 'checkvin'])->name('checkvin')->middleware('uus');
Route::post('/checkvin', [SettingsController::class, 'checkvinPost'])->name('checkvin')->middleware('uus');

Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index')->middleware('uus');
Route::get('blogs/create', [BlogController::class, 'create'])->name('blogs.create')->middleware('uus');
Route::post('blogs', [BlogController::class, 'store'])->name('blogs.store')->middleware('uus');
Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit')->middleware('uus');
Route::put('blogs/{blog}', [BlogController::class, 'update'])->name('blogs.update')->middleware('uus');
Route::get('blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy')->middleware('uus');
Route::get('blogs/image-delete/{id}', [BlogController::class, 'destoryImage'])->name('blogs.image.destroy')->middleware('uus');


Route::get('categories', [CategoryController::class, 'index'])->name('categories.index')->middleware('uus');
Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware('uus');
Route::post('categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('uus');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware('uus');
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('uus');
Route::get('categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware('uus');





