<?php

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
            'latest_users' => User::latest()->take(5)->get(),
            'latest_products' => Product::latest()->take(5)->get(),
        ];

        return view('admin.index', compact('stats'));
    }
}