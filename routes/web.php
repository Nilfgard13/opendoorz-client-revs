<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NomorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\CategoryLocationController;
use App\Http\Controllers\DashboardStaffController;

//user
Route::get('/', [LandingpageController::class, 'homeIndex'])->name('user.index');
Route::get('/details-property/{id}', [LandingpageController::class, 'detailsIndex'])->name('user.show');
Route::get('/property', [LandingpageController::class, 'propertyIndex'])->name('user.propertyIndex');
Route::get('/contact', [LandingpageController::class, 'contactIndex'])->name('user.contactIndex');
Route::post('/review-create', [ReviewController::class, 'store'])->name('review.store');

//Auth
Route::get('/ors-login', function () {
    return view('auth/login');
})->name('login');
Route::post('/ors-login-auth', [AuthController::class, 'login'])->name('login.auth');

//rotator
Route::get('/show-link/{id?}', [NomorController::class, 'showlink'])->name('rotator.showLink');

Route::middleware(['auth'])->group(function () {

    //admin
    Route::get('/home-admin', [DashboardController::class, 'countProperties'])->name('admin.dashboard');
    Route::post('/landing-page-update', [DashboardController::class, 'insertLandingPage'])->name('landingPage.insert');

    //property admin
    Route::get('/property-admin', [PropertyController::class, 'index'])->name('property.index');
    Route::post('/property-create', [PropertyController::class, 'store'])->name('property.store');
    Route::get('/form-property', [PropertyController::class, 'showCategory'])->name('property.showCategory');
    Route::get('/property-edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
    Route::put('/property-update/{id}', [PropertyController::class, 'update'])->name('property.update');
    Route::delete('/property-delete/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');

    //category type-admin
    Route::get('/category-admin', [CategoryTypeController::class, 'index'])->name('categorytype.index');
    Route::post('/category-create', [CategoryTypeController::class, 'store'])->name('categorytype.store');
    Route::put('/category-update/{id}', [CategoryTypeController::class, 'update'])->name('categorytype.update');
    Route::delete('/category-delete/{id}', [CategoryTypeController::class, 'destroy'])->name('categorytype.destroy');

    //category location-admin
    Route::get('/category-location-admin', [CategoryLocationController::class, 'index'])->name('categorylocation.index');
    Route::post('/category-location-create', [CategoryLocationController::class, 'store'])->name('categorylocation.store');
    Route::put('/category-location-update/{id}', [CategoryLocationController::class, 'update'])->name('categorylocation.update');
    Route::delete('/category-location-delete/{id}', [CategoryLocationController::class, 'destroy'])->name('categorylocation.destroy');

    //rotator-admin
    Route::get('/admin-admin', [NomorController::class, 'index'])->name('rotator.index');
    Route::post('/rotator-create', [NomorController::class, 'store'])->name('rotator.store');
    Route::put('/rotator-update/{id}', [NomorController::class, 'update'])->name('rotator.update');
    Route::delete('/rotator-delete/{id}', [NomorController::class, 'destroy'])->name('rotator.destroy');

    //Auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/user', [AuthController::class, 'getUserData'])->name('user.data');

    Route::middleware(['role:super admin'])->group(function () {

        //user-admin
        Route::get('/user-admin', [UserController::class, 'index'])->name('users.index');
        Route::post('/user-create', [UserController::class, 'store'])->name('users.store');
        Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        //review-admin
        Route::get('/review-admin', [ReviewController::class, 'index'])->name('review.index');
        Route::delete('/review-delete/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
    });
});
