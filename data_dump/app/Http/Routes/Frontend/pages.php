<?php
Route::get('/car-diagnostics', [\App\Http\Controllers\PagesController::class, 'cardiagnostics'])->name('car-diagnostics');
Route::get('/mot-services', [\App\Http\Controllers\PagesController::class, 'motservices'])->name('mot-services');
Route::get('/general-car-repairs', [\App\Http\Controllers\PagesController::class, 'generalcarrepairs'])->name('general-car-repairs');
Route::get('/air-conditioning', [\App\Http\Controllers\PagesController::class, 'airconditioning'])->name('air-conditioning');
Route::get('/contact-us', [\App\Http\Controllers\PagesController::class, 'contactus'])->name('contact-us');
Route::get('/terms-and-conditions', [\App\Http\Controllers\PagesController::class, 'terms'])->name('terms');
Route::get('/refundpolicy', [\App\Http\Controllers\PagesController::class, 'refundpolicy'])->name('refundpolicy');
Route::get('/privacypolicy', [\App\Http\Controllers\PagesController::class, 'privacypolicy'])->name('privacypolicy');
Route::get('/classified', [\App\Http\Controllers\PagesController::class, 'blogs'])->name('blogs');
Route::get('/pricing', [\App\Http\Controllers\PagesController::class, 'pricePage'])->name('price');
Route::get('/sample-report', [\App\Http\Controllers\PagesController::class, 'sampleReport'])->name('sample-report');
Route::get('/delivery-policy', [\App\Http\Controllers\PagesController::class, 'deliveryPolicy'])->name('delivery-policy');
Route::get('/classified/{slug}', [\App\Http\Controllers\PagesController::class, 'singleBlog'])->name('blogs.show');