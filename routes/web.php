<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
// Route::get('/', function () {
//     return view('home/home');
// });
Route::get('/', [LaundryController::class, "getLaundries"]);

Route::get('/register', function () {
    return view('register/register');
});
Route::get('/login', function () {
    return view('login/login');
});
Route::controller(LaundryController::class)->group(function(){
    Route::get('/detailLaundry/{id}', 'renderDetailLaundryView');
    Route::get('detailLaundry/{id}/ratingLaundry', "renderRatingLaundryView");
    Route::post('detailLaundry/ratingLaundry', "postRatingLaundry");
});