<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;

// Главная
Route::get('/', function () {
    return view('home');
})->name('home');

// Статические страницы
Route::get('/where', function () { return view('where'); })->name('where');
Route::get('/about', function () { return view('about'); })->name('about');

// Каталог товаров
Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('/catalog/{product}', [ProductController::class, 'show'])->name('product.show');

// Корзина
Route::get('/basket', [CartController::class, 'index'])->name('basket');
Route::post('/basket/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/basket/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/basket/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/basket/update/{product}', [CartController::class, 'update'])->name('cart.update');

// Аутентификация
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Админка - защищенные маршруты
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    
    // Дашборд админки
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // Управление товарами
    Route::resource('products', AdminProductController::class)->except(['show']);
    // Это автоматически создаст все нужные маршруты:
    // GET /admin/products → index
    // GET /admin/products/create → create  
    // POST /admin/products → store
    // GET /admin/products/{product}/edit → edit
    // PUT/PATCH /admin/products/{product} → update
    // DELETE /admin/products/{product} → destroy
});

// Временный маршрут для GET logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

