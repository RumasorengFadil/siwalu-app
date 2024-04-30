<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::controller(LaundryController::class)->group(function(){
    Route::get('/', "renderHomeView")->name("home");
    Route::get('/detailLaundry/{id}', 'renderDetailLaundryView')->name("detailLaundry");
});

Route::controller(RatingController::class)->group(function(){
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get('detailLaundry/ratingLaundry/{id}', "renderRatingLaundryView")->name("ratingLaundryView");
        Route::post('detailLaundry/{id}', "postRatingLaundry");
    });
});

Route::controller(UserController::class)->group(function(){
    Route::post("/register", "register")->name("register");
    Route::get('/register', "renderRegisterView")->name("register");
    
    Route::post("/login", "login")->name("login");
    Route::get("/logout", "logout")->name("logout");

    Route::get('/login', "renderLoginView")->middleware("guest")->name('login');
});

Route::get("/admin/acc", function(){
        return view('admin.index');
})->name("dashboard");

Route::get("/admin/addLaundry", function(){
    return view('admin.addLaundryView');
})->name("addLaundry");

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
});