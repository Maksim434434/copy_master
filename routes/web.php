<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/where', function () {
    return view('where');
})->name('where');

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/about', function () {
    return view('about');
})->name('about');
