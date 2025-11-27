<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'users_count' => User::count(),
            'products_count' => Product::count(),
            'products_in_stock' => Product::where('stock', '>', 0)->count(),
            'total_inventory' => Product::sum('stock'),
            'latest_products' => Product::latest()->take(5)->get(),
        ];

        $products = Product::latest()->get();
        $users = User::latest()->take(5)->get();

        return view('admin.index', compact('stats', 'products', 'users'));
    }

    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function destroyUser(User $user)
    {
        // Запрещаем удаление самого себя
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.users')
                ->with('error', 'Нельзя удалить собственный аккаунт');
        }

        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', 'Пользователь успешно удален');
    }
}