<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::controller(LaundryController::class)->group(function(){
    Route::get('/', "renderHomeView")->name("home");
    Route::get('/detailLaundry/{id}', 'renderDetailLaundryView')->name("detailLaundry");
    Route::post('/send-to-whatsapp', 'sendMessage')->name("send.massage");
});

Route::controller(RatingController::class)->group(function(){
    Route::middleware(["auth", "verified"])->group(function () {
        Route::get('detailLaundry/ratingLaundry/{id}', "renderRatingLaundryView")
        ->name("ratingLaundryView");
        Route::post('detailLaundry/{id}', "postRatingLaundry");
    });
});

Route::controller(UserController::class)->group(function(){
    Route::get('/register', "renderRegisterView")->middleware("guest")->name("register");
    Route::get('/registerMitra', "renderRegisterMitraView")->middleware("auth")->name("registerMitra.show");
    Route::get('/login', "renderLoginView")->middleware("guest")->name('login');
    
    Route::post("/register", "register")->name("register");
    // Route::post('/registerMitra', "registerMitra")->middleware("auth")->name("registerMitra.store");
    
    Route::post("/login", "login")->name("login");
    Route::post("/logout", "logout")->name("logout");
    
});
Route::controller(ApplicantController::class)->group(function(){
    Route::get('/registerMitra', "renderRegisterMitraView")->middleware(["auth","user"])->name("registerMitra.show");
    Route::put('/registerMitra', "finishApplicant")->middleware(["auth","user"])->name("registerMitra.finish");

    Route::post('/registerMitra', "registerMitra")->middleware(["auth","user"])->name("registerMitra.store");
});

Route::controller(FavoriteController::class)->group(function() {
    Route::post('favorite/store', "storeFavorite")->middleware("auth")->name("favorite.store");
    Route::get('favorite', "renderFavoriteView")->middleware("auth")->name("favorite.show");
});

Route::controller(AdminController::class)->group(function(){
    Route::get("/admin/dashboard", "renderDashboardView")
    ->middleware('admin')
    ->name("dashboard.show");
    
    Route::get("/admin/accLaundry", "renderAccLaundryView")
    ->middleware('admin')
    ->name("accLaundry.show");


    Route::get("/admin/addLaundry", "renderAddLaundryView")
    ->middleware('admin')
    ->name("addLaundry.show");

    Route::get("/admin/updateLaundry", "renderUpdateLaundryView")
    ->middleware('admin')
    ->name("updateLaundry.show");

    Route::get("/admin/deleteLaundry", "renderDeleteLaundryView")
    ->middleware('admin')
    ->name("deleteLaundry.show");
    
    Route::put("/admin/accLaundry", "rejectApplicant")
    ->middleware('admin')
    ->name("accLaundry.reject");

    Route::post("/admin/accLaundry", "acceptApplicant")
    ->middleware('admin')
    ->name("accLaundry.accept");
    
    Route::post("/admin/addLaundry", "postLaundry")->middleware('admin')->name("laundry.post");
});




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