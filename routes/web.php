<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

// Аутентификация через контроллер
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Временное решение: добавить GET для logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/about', function () {
    return view('about');
})->name('about');