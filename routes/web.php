<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;

// Главная
Route::get('/', function () {
    return view('home');
})->name('home');

// Статические страницы
Route::get('/where', function () { return view('where'); })->name('where');
Route::get('/about', function () { return view('about'); })->name('about');

// Каталог товаров - ТЕПЕРЬ ТОЛЬКО ДЛЯ АВТОРИЗОВАННЫХ
Route::middleware('auth')->group(function () {
    Route::get('/catalog', [ProductController::class, 'index'])->name('catalog');
    Route::get('/catalog/{product}', [ProductController::class, 'show'])->name('product.show');
});

// Корзина
Route::get('/basket', [CartController::class, 'index'])->name('basket');
Route::post('/basket/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/basket/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/basket/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/basket/update/{product}', [CartController::class, 'update'])->name('cart.update');

// Заказы
Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');
Route::delete('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');

// Личный кабинет
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/profile/orders/{order}', [ProfileController::class, 'orderDetails'])->name('profile.order.details');
});

// Аутентификация
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Админские маршруты
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    
    // Маршруты для товаров
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    
    // Маршруты для пользователей
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');
});

// Временный маршрут для GET logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

