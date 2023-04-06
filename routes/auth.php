<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthSocial\SocialiteloginController;



Route::prefix('/')->name('')->group(function () {
    Route::view('/home', 'back.pages.front.home')->name('home');

    Route::middleware(['guest'])->group(function () {
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/register', 'back.pages.auth.register')->name('register');
        Route::view('/forgot-password', 'back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class , 'ResetForm'])->name('reset-form');
        /*********************Socialite-Login**********************/
        Route::get('/login/{provider}/redirect',[SocialiteloginController::class,'redirect'])->name('Socialite-login-redirect');
        Route::get('/login/{provider}/callback',[SocialiteloginController::class,'callback'])->name('Socialite-login-callback');

    });

    Route::middleware(['auth'])->group(function () {
        Route::view('/verification', 'back.pages.auth.verification')->name('verification');
        Route::get('/logout', [AuthorController::class , 'logout'])->name('logout');
    });

    Route::middleware(['auth','verified'])->group(function () {
        Route::view('/profile', 'back.pages.front.profile')->name('profile');
        Route::post('/crop',[AuthorController::class, 'crop'])->name('crop');
    });

});
