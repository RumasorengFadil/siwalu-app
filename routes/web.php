<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('home/home');
// });
Route::get('/', [LaundryController::class, "getLaundries"])->name("home");

Route::get('/register', function () {
    return view('register/register');
});
Route::get('/login', function () {
    return view('login/login');
});
Route::controller(LaundryController::class)->group(function(){
    Route::get('/detailLaundry/{id}', 'renderDetailLaundryView')->name("detailLaundry");
});

Route::controller(RatingController::class)->group(function(){
    Route::get('detailLaundry/ratingLaundry/{id}', "renderRatingLaundryView");
    Route::post('detailLaundry/{id}', "postRatingLaundry");
});


Route::post("/register",[UserController::class, "register"])->name("register");