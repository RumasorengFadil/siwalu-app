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
Route::get('/detailLaundry/{id}', [LaundryController::class, "getLaundry"]);
Route::get('detailLaundry/{id}/rating', function ($id) {
    dump($id);
    return view('rating/ratingView');
});