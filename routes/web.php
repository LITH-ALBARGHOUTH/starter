<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\SocialController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/', function(){
    //return 'Home';

    $data = ['title' => 'programming' , 'body' => 'php'];
    Mail::To('alkhateebyasmeen28@gmail.com') -> send (new NotifyEmail($data));
});

Route::get('/dashboard', function(){
    return 'dashboard';
});


Route::get('/redirect/{service}', [SocialController::class, 'redirect']);
Route::get('/callback/{service}', [SocialController::class, 'callback']);


Route::get('fillable', [CrudController::class, 'getoffers']);

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function(){

    Route::group(['prefix'=>'offers'],function(){
        // Route::get('store', [CrudController::class, 'store']);
        Route::get('create',[CrudController::class, 'create']);
        Route::post('store',[CrudController::class, 'store'])->name('offers.store');
    });
    
});

