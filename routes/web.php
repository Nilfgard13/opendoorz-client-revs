<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NomorController;
use App\Http\Controllers\CategoryTypeController;
use App\Http\Controllers\CategoryLocationController;

//user
Route::get('/', function () {
    return view('user/home', ['title' => 'Home Page']);
});

Route::get('/property', function () {
    return view('user/property', ['title' => 'Property']);
});

Route::get('/details-property', function () {
    return view('user/details-property', ['title' => 'Property Details']);
});

Route::get('/contact', function () {
    return view('user/contact', ['title' => 'Contact']);
});

//admin
Route::get('/home-admin', function () {
    return view('admin/home', ['title' => 'Dashboard']);
});

//user-admin
Route::get('/user-admin', [UserController::class, 'index'])->name('users.index');
Route::post('/user-create', [UserController::class, 'store'])->name('users.store');
Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/property-admin', function () {
    return view('admin/property', ['title' => 'Property Admin']);
});

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
Route::get('/show-link', [NomorController::class, 'showlink'])->name('rotator.showLink');

Route::get('/blog-admin', function () {
    return view('admin/blog', ['title' => 'Blog Admin']);
});

Route::get('/review-admin', function () {
    return view('admin/review', ['title' => 'Review Admin']);
});

//Auth
Route::get('/ors-login', function () {
    return view('auth/login');
});

Route::get('/ors-register', function () {
    return view('auth/register');
});