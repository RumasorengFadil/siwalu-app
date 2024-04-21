<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::controller(LaundryController::class)->group(function(){
    Route::get('/', "renderHomeView")->name("home");
    Route::get('/detailLaundry/{id}', 'renderDetailLaundryView')->name("detailLaundry");
});

Route::controller(RatingController::class)->group(function(){
    Route::middleware("auth")->group(function () {
        Route::get('detailLaundry/ratingLaundry/{id}', "renderRatingLaundryView")->name("ratingLaundryView");
        Route::post('detailLaundry/{id}', "postRatingLaundry");
    });
});

Route::controller(UserController::class)->group(function(){
    Route::post("/register", "register")->name("register");
    Route::post("/login", "login")->name("login");
    Route::get("/logout", "logout")->name("logout");

    Route::get('/register', "renderRegisterView");
    Route::get('/login', "renderLoginView")->middleware("guest");
});

