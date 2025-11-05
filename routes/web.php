<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AuthController;
=======
>>>>>>> cbde107b0554aeaf4e3c1face53195bd05da6bd1

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

<<<<<<< HEAD
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
=======
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/about', function () {
    return view('about');
})->name('about');
>>>>>>> cbde107b0554aeaf4e3c1face53195bd05da6bd1
