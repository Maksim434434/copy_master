<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Главная
Route::get('/', function () {
    return view('home');
})->name('home');

// Статические страницы
Route::get('/where', function () { return view('where'); })->name('where');
Route::get('/catalog', function () { return view('catalog'); })->name('catalog');
Route::get('/basket', function () { return view('basket'); })->name('basket');
Route::get('/about', function () { return view('about'); })->name('about');

// Аутентификация
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.get');

// Админка - упрощенная версия пока не создана таблица
Route::get('/admin', function () {
    if (!auth()->check() || auth()->user()->login !== 'admin') {
        return redirect('/login')->with('error', 'Нет доступа к админке');
    }
    
    // Проверяем существует ли таблица categories
    try {
        $categories = \App\Models\Category::all();
    } catch (\Exception $e) {
        // Если таблицы нет, показываем сообщение
        return view('admin.setup', ['message' => 'Таблица категорий не создана. Запустите миграцию.']);
    }
    
    return view('admin.index', compact('categories'));
})->name('admin.index');

// Временные маршруты для категорий (добавить после создания таблицы)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Добавление категории
    Route::post('/categories', function (\Illuminate\Http\Request $request) {
        if (auth()->user()->login !== 'admin') {
            return redirect('/login')->with('error', 'Нет доступа');
        }
        
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
            
            $category = \App\Models\Category::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            
            return redirect('/admin')->with('success', 'Категория добавлена!');
        } catch (\Exception $e) {
            return redirect('/admin')->with('error', 'Ошибка: ' . $e->getMessage());
        }
    })->name('admin.categories.store');
    
    // Удаление категории
    Route::delete('/categories/{category}', function ($id) {
        if (auth()->user()->login !== 'admin') {
            return redirect('/login')->with('error', 'Нет доступа');
        }
        
        try {
            $category = \App\Models\Category::findOrFail($id);
            $category->delete();
            
            return redirect('/admin')->with('success', 'Категория удалена!');
        } catch (\Exception $e) {
            return redirect('/admin')->with('error', 'Ошибка: ' . $e->getMessage());
        }
    })->name('admin.categories.destroy');
});