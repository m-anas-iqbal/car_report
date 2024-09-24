<?php
Route::group([
    'prefix'        =>  'admin', 
], function () {
    
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login')->middleware('guestadmin');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'attempt']);


    // Route::get('/createadmin', function(){
    //     return \App\Models\User::create([
    //         'name'  =>  'Administrator',
    //         'email' =>  'admin@admin.com',
    //         'password' => bcrypt('admin@123'),
    //         'type'      =>  999,
    //         'credits'   =>  0
    //     ]);
    //     return 'created';
    // });
	/*
	Route::get('/awdaw', function(){
		\App\Models\User::find(1)->update([
			'password'	=>	bcrypt('nQ9*wY7,qV7)oW0:')
		]);
		return 'updated';
	});
	*/
    
});