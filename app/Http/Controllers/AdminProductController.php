<?php
// app/Http\Controllers/AdminProductController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        
        $stats = [
            'products_count' => Product::count(),
            'products_in_stock' => Product::where('stock', '>', 0)->count(),
            'total_inventory' => Product::sum('stock'),
            'users_count' => \App\Models\User::count(),
        ];

        return view('admin.products.index', compact('products', 'stats'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        // Если изображение загружено, сохраняем его
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        } else {
            // Если изображение не загружено, устанавливаем изображение по умолчанию для категории
            $validated['image'] = $this->getDefaultImageForCategory($validated['category']);
        }

        // Добавляем slug и активность
        $validated['slug'] = Str::slug($validated['name']) . '-' . Str::random(6);
        $validated['is_active'] = true;

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно добавлен');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Удаляем старое изображение если оно было локальным
            if ($product->image && !str_starts_with($product->image, 'http')) {
                Storage::disk('public')->delete($product->image);
            }
            
            $imagePath = $request->file('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        } else if (empty($product->image) || str_contains($product->image, 'placeholder')) {
            // Если изображения не было или это placeholder, устанавливаем по умолчанию
            $validated['image'] = $this->getDefaultImageForCategory($validated['category']);
        } else {
            // Сохраняем существующее изображение
            $validated['image'] = $product->image;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно обновлен');
    }

    public function destroy(Product $product)
    {
        // Удаляем изображение если оно локальное (не URL)
        if ($product->image && !str_starts_with($product->image, 'http')) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Товар успешно удален');
    }
}