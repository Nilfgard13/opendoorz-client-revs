<?php

use Illuminate\Support\Facades\Route;

//user
Route::get('/', function () {
    return view('user/home');
});

Route::get('/property', function () {
    return view('user/property');
});

Route::get('/details-property', function () {
    return view('user/details-property');
});

Route::get('/contact', function () {
    return view('user/contact');
});

//admin
Route::get('/home-admin', function () {
    return view('admin/home', ['title' => 'Dashboard']);
});

Route::get('/user-admin', function () {
    return view('admin/user', ['title' => 'User Admin']);
});

Route::get('/property-admin', function () {
    return view('admin/property', ['title' => 'Property Admin']);
});

Route::get('/category-admin', function () {
    return view('admin/category', ['title' => 'Property Admin']);
});

Route::get('/admin-admin', function () {
    return view('admin/rotator', ['title' => 'Rotator Admin']);
});

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