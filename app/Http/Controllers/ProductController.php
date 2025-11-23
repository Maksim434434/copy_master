<?php
// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true); // Только активные товары
        
        // Фильтрация по категории
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        // Фильтрация по бренду
        if ($request->has('brand') && $request->brand) {
            $query->where('brand', $request->brand);
        }
        
        // Сортировка
        switch ($request->get('sort', 'newest')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            case 'popular':
                // Если нет поля views, сортируем по ID
                $query->orderBy('id', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
        
        $products = $query->paginate(12)->withQueryString();
        
        return view('catalog', compact('products'));
    }

    public function show(Product $product)
    {
        // Проверяем, активен ли товар
        if (!$product->is_active) {
            abort(404);
        }
        
        return view('product', compact('product'));
    }
}