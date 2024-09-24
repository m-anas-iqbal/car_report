<?php

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('optimize:clear');
    return "Cleared Successfully";
});

Route::get('/find/report/', [\App\Http\Controllers\HomeController::class, 'find_invoice'])->name('find_invoice'); //copy
Route::post('/find/report/post', [\App\Http\Controllers\HomeController::class, 'find_invoice_post'])->name('find_invoice_post');
Route::get('/invoice/{id}', [\App\Http\Controllers\HomeController::class, 'invoiceView']); //copy
Route::get('/normal-report', [\App\Http\Controllers\HomeController::class, 'normalReport']); //copy

Route::any('/sellfy-webhook', [\App\Http\Controllers\HomeController::class, 'sellfyWebhook']);

Route::get('/bank-account-payment-success/{vin}/{receipt}/{bank}', [\App\Http\Controllers\HomeController::class, 'bankAccountPaymentSuccess']);
Route::get('/cancel-bank-payment/{vin}/{receipt}/{bank}', [\App\Http\Controllers\HomeController::class, 'cancelBankPayment']);
Route::post('/pay-using-bank-account/{vin}/{receipt}/{bank}', [\App\Http\Controllers\HomeController::class, 'uploadBankAccountPaymentScreenshot']);
Route::get('/pay-using-bank-account/{vin}/{receipt}/{bank}', [\App\Http\Controllers\HomeController::class, 'payUsingBankAccount']);


Route::post('/generate-bankaccount-payment-link', [\App\Http\Controllers\HomeController::class, 'generateBankAccountPaymentLink']);

Route::post("/charge_from_paytabs_card",[\App\Http\Controllers\HomeController::class, 'chargeFromPaytabsCard']);

// Route::post("paytabs_hosted/payment", [\App\Http\Controllers\HomeController::class, 'generatePayTabsMakePayment']);
Route::post('/generate-paytabs-payment-link', [\App\Http\Controllers\HomeController::class, 'generatePayTabsPaymentLink']);


Route::post('paytabs_hosted_return_url/{paytabs_order_id}', [\App\Http\Controllers\HomeController::class, 'payTabsHostedReturnURL']);

Route::post('paytabs-return-url/{paytabs_order_id}', [\App\Http\Controllers\HomeController::class, 'payTabsReturnURL']);


Route::get("notification-url-coinremitter",[\App\Http\Controllers\HomeController::class, 'coinremitterNotify']);
Route::get("coinremitter/failed",[\App\Http\Controllers\HomeController::class, 'coinremitterFailed']);

Route::get("paytabs-payment-failed",[\App\Http\Controllers\HomeController::class, 'paytabsFailed']);

Route::get("coinremitter/success",[\App\Http\Controllers\HomeController::class, 'coinremitterSuccess']);

Route::get('testing', [\App\Http\Controllers\HomeController::class, 'testing']);
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('check-new-unseen-receipt-for-ajax', [\App\Http\Controllers\HomeController::class, 'checkNewUnseenReceiptForAjax'])->middleware('uus');
Route::post('/checkout', [\App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::get('/checkout/{vin}', [\App\Http\Controllers\HomeController::class, 'checkoutvin'])->name('checkoutvin');
Route::post('/charge_from_paypal', [\App\Http\Controllers\HomeController::class, 'charge_from_paypal'])->name('charge_from_paypal');



Route::post('/make-authorizenet-payment', [\App\Http\Controllers\HomeController::class, 'makeAuthorizeNetPayment']);

Route::get("authorizeNet/failed",[\App\Http\Controllers\HomeController::class, 'authorizeNetFailed']);

Route::post('/generate-coinremitter-payment-link', [\App\Http\Controllers\HomeController::class, 'generateCoinremitterPaymentLink']);

Route::post('/charge_from_card', [\App\Http\Controllers\HomeController::class, 'charge_from_card'])->name('charge_from_card');
Route::post('/charge_from_btc', [\App\Http\Controllers\HomeController::class, 'charge_from_btc'])->name('charge_from_btc');

Route::post('/charge_from_card_no_vin', [\App\Http\Controllers\HomeController::class, 'charge_from_card_no_vin'])->name('charge_from_card_no_vin');
Route::post('/charge_from_paypal_no_vin', [\App\Http\Controllers\HomeController::class, 'charge_from_paypal_no_vin'])->name('charge_from_paypal_no_vin');
Route::post('/charge_from_btc_no_vin', [\App\Http\Controllers\HomeController::class, 'charge_from_btc_no_vin'])->name('charge_from_btc_no_vin');

Route::get('/finish_order/{report_id}', [\App\Http\Controllers\HomeController::class, 'finish_order'])->name('finish_order');
Route::get('/finish_package_order/{report_id}', [\App\Http\Controllers\HomeController::class, 'finish_package_order'])->name('finish_package_order');
Route::get('/btc_order/{transaction_id}', [\App\Http\Controllers\HomeController::class, 'btc_order'])->name('btc_order');

Route::get('/report_show/{vin}', [\App\Http\Controllers\HomeController::class, 'report_show'])->name('report_show');
Route::get('/price', [\App\Http\Controllers\PagesController::class, 'price'])->name('price');
Route::get('/test', [\App\Http\Controllers\PagesController::class, 'test'])->name('test');
Route::post('/initpayment', [\App\Http\Controllers\CheckoutController::class, 'initpayment'])->name('initpayment');
Route::get('/vwpsuccess', [\App\Http\Controllers\CheckoutController::class, 'vwpsuccess'])->name('vwpsuccess');
Route::get('/vwpfailure', [\App\Http\Controllers\CheckoutController::class, 'vwpfailure'])->name('vwpsuccess'); 
Route::get('/payment_failed/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'payment_failed'])->name('payment_failed');  
Route::post('/initpppayment', [\App\Http\Controllers\CheckoutController::class, 'initpppayment'])->name('initpppayment'); 
Route::get('/pppverific', [\App\Http\Controllers\CheckoutController::class, 'pppverific'])->name('pppverific'); 
Route::get('/test_paypal_payments', [\App\Http\Controllers\CheckoutController::class, 'test_paypal_payments'])->name('test_paypal_payments'); 

Route::get('/transaction_completed_via_paypal', [\App\Http\Controllers\CheckoutController::class, 'transaction_complete'])->name('transaction_complete'); 



Route::get('/test_report/{vin}', [\App\Http\Controllers\HomeController::class, 'test_report']);

Route::get('/testingByYazdan', [\App\Http\Controllers\HomeController::class, 'testingByYazdan']);

Route::get('reports/{vin}', [\App\Http\Controllers\HomeController::class, 'viniReport']);
