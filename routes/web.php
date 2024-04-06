<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home/home');
});

Route::get('/register', function () {
    return view('register/register');
});
