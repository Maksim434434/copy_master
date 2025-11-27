<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $recentOrders = Order::where('user_id', $user->id)
            ->with(['items.product']) // Загружаем items с продуктами
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('profile.index', compact('user', 'recentOrders'));
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
            ->with(['items.product']) // Загружаем items с продуктами
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('profile.orders', compact('user', 'orders'));
    }

    public function orderDetails(Order $order)
    {
        // Проверяем, что заказ принадлежит текущему пользователю
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Доступ запрещен');
        }

        $order->load(['items.product']); // Загружаем items с продуктами

        return view('profile.order-details', compact('order'));
    }
}