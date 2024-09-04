<?php

use App\Http\Controllers\SocialController;

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', function(){
    return 'Home';
});

Route::get('/dashboard', function(){
    return 'dashboard';
});


Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);
