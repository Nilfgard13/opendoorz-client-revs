<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NomorController;

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

Route::get('/category-admin', function () {
    return view('admin/category', ['title' => 'Property Admin']);
});

//rotator-admin
Route::get('/admin-admin', [NomorController::class, 'index'])->name('rotator.index');
Route::post('/rotator-create', [NomorController::class, 'store'])->name('rotator.store');
Route::put('/rotator-update/{id}', [NomorController::class, 'update'])->name('rotator.update');
Route::delete('/rotator-delete/{id}', [NomorController::class, 'destroy'])->name('rotator.destroy');
// Route::get('/wa-rotator', [NomorController::class, 'generateLink'])->name('rotator.generateLink');
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