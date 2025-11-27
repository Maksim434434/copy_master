<x-layout title="Детали заказа">
    <x-section title="Детали заказа">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Боковое меню -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
                        <nav class="space-y-2">
                            <a href="{{ route('profile') }}" 
                               class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Профиль
                            </a>
                            <a href="{{ route('profile.orders') }}" 
                               class="flex items-center p-3 rounded-lg bg-blue-50 text-blue-600 font-semibold transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                </svg>
                                Мои заказы
                            </a>
                            <a href="{{ route('basket') }}" 
                               class="flex items-center p-3 rounded-lg text-gray-600 hover:bg-gray-50 transition-colors duration-200">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Корзина
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Основной контент -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        <!-- Хлебные крошки -->
                        <nav class="flex mb-6" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('profile') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Профиль
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <a href="{{ route('profile.orders') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Мои заказы</a>
                                    </div>
                                </li>
                                <li aria-current="page">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                        </svg>
                                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Детали заказа</span>
                                    </div>
                                </li>
                            </ol>
                        </nav>

                        <!-- Статус заказа -->
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                            <div class="flex items-center justify-between mb-6">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">Заказ №{{ $order->id }}</h2>
                                    <p class="text-gray-600 mt-1">Создан: {{ $order->created_at->format('d.m.Y H:i') }}</p>
                                </div>
                                <div class="text-right">
                                    @if($order->status === 'cancelled')
                                        <span class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Отменен
                                        </span>
                                    @elseif($order->status === 'completed')
                                        <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Завершен
                                        </span>
                                    @elseif($order->status === 'processing')
                                        <span class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            В обработке
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-semibold">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Ожидание
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Информация о доставке -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Получатель
                                    </h3>
                                    <p class="text-gray-800 font-medium">{{ $order->customer_name }}</p>
                                    <p class="text-gray-600">{{ $order->customer_phone }}</p>
                                    <p class="text-gray-600">{{ $order->customer_email }}</p>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Адрес доставки
                                    </h3>
                                    <p class="text-gray-800">{{ $order->delivery_address }}</p>
                                    
                                    @if($order->status !== 'cancelled')
                                        <div class="mt-2 space-y-1">
                                            <p class="text-green-600 font-medium flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Ожидаемая доставка: {{ now()->addDays(3)->format('d.m.Y') }}
                                            </p>
                                            <p class="text-gray-600 text-sm">
                                                Способ доставки: 
                                                @if($order->delivery_method === 'pickup')
                                                    Самовывоз
                                                @else
                                                    Курьерская доставка
                                                @endif
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Товары в заказе -->
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Состав заказа</h3>
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex items-center space-x-4 p-4 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors duration-200">
                                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" 
                                                 class="max-w-full max-h-full object-contain"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.jpg') }}'">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h4 class="font-semibold text-gray-800 hover:text-blue-600">
                                                <a href="{{ route('product.show', $item->product->id) }}">{{ $item->product->name }}</a>
                                            </h4>
                                            <p class="text-gray-600 text-sm">{{ $item->product->brand }}</p>
                                            <p class="text-gray-600 text-sm">Количество: {{ $item->quantity }}</p>
                                            <p class="text-gray-600 text-sm">Цена за шт.: {{ number_format($item->price, 0, ',', ' ') }} ₽</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-800">{{ number_format($item->price * $item->quantity, 0, ',', ' ') }} ₽</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Итоговая стоимость -->
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                            <h3 class="text-xl font-bold text-gray-800 mb-6">Информация о заказе</h3>
                            
                            <!-- Способ оплаты -->
                            <div class="mb-6">
                                <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    Способ оплаты
                                </h4>
                                <p class="text-gray-800 font-medium">
                                    @if($order->payment_method == 'card')
                                        Банковской картой
                                    @else
                                        Наличными при получении
                                    @endif
                                </p>
                            </div>

                            <!-- Итоговая стоимость -->
                            <div class="border-t border-gray-200 pt-4 space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Товары</span>
                                    <span class="font-semibold text-gray-800">{{ number_format($order->total, 0, ',', ' ') }} ₽</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Доставка</span>
                                    <span class="font-semibold text-green-600">Бесплатно</span>
                                </div>
                                <div class="flex justify-between items-center text-lg font-bold pt-3 border-t border-gray-200">
                                    <span>Итого</span>
                                    <span class="text-blue-600">{{ number_format($order->total, 0, ',', ' ') }} ₽</span>
                                </div>
                            </div>

                            <!-- Действия -->
                            <div class="mt-6 space-y-3">
                                <a href="{{ route('profile.orders') }}" 
                                   class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                    Назад к заказам
                                </a>
                                <a href="{{ route('catalog') }}" 
                                   class="w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-xl font-semibold transition-all duration-200 hover:border-blue-500 hover:text-blue-600 flex items-center justify-center">
                                    Продолжить покупки
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layout>