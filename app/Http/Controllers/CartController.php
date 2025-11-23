<?php
// app/Http/Controllers/CartController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $products = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $product->quantity = $quantity;
                $product->subtotal = $product->price * $quantity;
                $products[] = $product;
                $total += $product->subtotal;
            }
        }

        return view('basket', compact('products', 'total'));
    }

    public function add(Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1;
        }

        Session::put('cart', $cart);

        // Перенаправляем в корзину с сообщением об успехе
        return redirect()->route('basket')->with('success', 'Товар "' . $product->name . '" добавлен в корзину!');
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Товар "' . $product->name . '" удален из корзины!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart', []);
        
        if ($request->quantity == 0) {
            unset($cart[$product->id]);
        } else {
            $cart[$product->id] = $request->quantity;
        }
        
        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Количество товара "' . $product->name . '" обновлено!');
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->route('basket')->with('success', 'Корзина очищена!');
    }

    public function getCartCount()
    {
        $cart = Session::get('cart', []);
        $count = array_sum($cart);
        
        return response()->json(['count' => $count]);
    }
}