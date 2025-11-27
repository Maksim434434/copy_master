<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function create()
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

        return view('checkout', compact('products', 'total'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'payment_method' => 'required|in:card,cash',
        ]);

        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Корзина пуста');
        }

        $total = 0;
        
        // Сначала считаем общую сумму
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $total += $product->price * $quantity;
            }
        }

        // Создаем заказ в базе данных
        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $validated['name'],
            'customer_phone' => $validated['phone'],
            'customer_email' => $validated['email'],
            'delivery_method' => 'courier',
            'delivery_address' => $validated['city'] . ', ' . $validated['address'],
            'payment_method' => $validated['payment_method'],
            'status' => 'completed', // ИЗМЕНИЛ НА completed
            'total' => $total, // Сразу устанавливаем правильную сумму
        ]);

        // Добавляем товары в заказ
        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $product->price,
                ]);
            }
        }

        // Очищаем корзину
        Session::forget('cart');

        // Сохраняем ID последнего заказа для подтверждения
        Session::put('last_order_id', $order->id);

        return redirect()->route('order.confirmation')->with('success', 'Заказ успешно оформлен!');
    }

    public function confirmation()
    {
        $orderId = Session::get('last_order_id');
        
        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Заказ не найден');
        }

        $order = Order::with(['items.product'])->find($orderId);
        
        if (!$order) {
            return redirect()->route('home')->with('error', 'Заказ не найден');
        }

        return view('order-confirmation', compact('order'));
    }

    public function cancel(Order $order)
    {
        // Проверяем, что заказ принадлежит текущему пользователю
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Доступ запрещен');
        }
        
        // Проверяем, что заказ еще не отменен
        if ($order->status === 'cancelled') {
            return redirect()->route('order.confirmation')->with('error', 'Заказ уже отменен');
        }
        
        // Обновляем статус заказа
        $order->update(['status' => 'cancelled']);
        
        return redirect()->route('order.confirmation')->with('success', 'Заказ успешно отменен');
    }
}