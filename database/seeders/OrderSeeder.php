<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // Получаем первого пользователя
        $user = User::first();
        
        if (!$user) {
            // Создаем пользователя если нет
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Получаем или создаем продукты
        $products = Product::take(3)->get();
        if ($products->isEmpty()) {
            $products = Product::factory(3)->create();
        }

        // Создаем несколько заказов
        $orders = [
            [
                'status' => 'completed',
                'total' => 150000, // Изменили на total
                'delivery_method' => 'courier',
                'payment_method' => 'card',
            ],
            [
                'status' => 'processing', 
                'total' => 89000, // Изменили на total
                'delivery_method' => 'pickup',
                'payment_method' => 'cash',
            ],
            [
                'status' => 'pending',
                'total' => 234500, // Изменили на total
                'delivery_method' => 'courier',
                'payment_method' => 'card',
            ]
        ];

        foreach ($orders as $orderData) {
            $order = Order::create([
                'user_id' => $user->id,
                'customer_name' => $user->name,
                'customer_email' => $user->email,
                'customer_phone' => '+7999' . rand(1000000, 9999999),
                'delivery_method' => $orderData['delivery_method'],
                'delivery_address' => 'г. Усть-Катав, ул. Тестовая, д. ' . rand(1, 100),
                'payment_method' => $orderData['payment_method'],
                'comment' => 'Тестовый заказ',
                'status' => $orderData['status'],
                'total' => $orderData['total'], // Изменили на total
                'created_at' => now()->subDays(rand(1, 30)),
            ]);

            // Добавляем товары в заказ
            foreach ($products as $product) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => rand(1, 3),
                    'price' => $product->price,
                ]);
            }
        }

        $this->command->info('Тестовые заказы созданы!');
    }
}