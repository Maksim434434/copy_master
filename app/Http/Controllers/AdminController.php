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

        $products = Product::latest()->get(); // Добавляем продукты

        return view('admin.index', compact('stats', 'products')); // Передаем обе переменные
    }
}