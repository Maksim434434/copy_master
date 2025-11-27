<x-layout title="Подтверждение заказа">
    <x-section title="Подтверждение заказа">
        <div class="container mx-auto px-4 py-8">
            <!-- Хлебные крошки -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('catalog') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Каталог</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Подтверждение заказа</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-6 py-4 rounded-xl mb-8">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-700 px-6 py-4 rounded-xl mb-8">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Основная информация -->
                <div class="lg:col-span-2">
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
                                    <span class="inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Подтвержден
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

                        <!-- Прогресс заказа -->
                        @if($order->status !== 'cancelled')
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <h4 class="font-semibold text-gray-800 mb-4">Статус заказа</h4>
                                <div class="flex items-center justify-between">
                                    @php
                                        $steps = [
                                            'pending' => ['name' => 'Ожидание', 'icon' => 'clock', 'color' => 'yellow'],
                                            'processing' => ['name' => 'В обработке', 'icon' => 'cog', 'color' => 'blue'],
                                            'completed' => ['name' => 'Завершен', 'icon' => 'check', 'color' => 'green']
                                        ];
                                        $currentStep = array_search($order->status, array_keys($steps));
                                        $currentStep = $currentStep !== false ? $currentStep : 0;
                                    @endphp
                                    
                                    @foreach($steps as $key => $step)
                                        <div class="flex flex-col items-center flex-1">
                                            <div class="w-10 h-10 rounded-full flex items-center justify-center 
                                                {{ $currentStep >= array_search($key, array_keys($steps)) 
                                                    ? 'bg-' . $step['color'] . '-100 text-' . $step['color'] . '-600' 
                                                    : 'bg-gray-100 text-gray-400' }} mb-2">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    @if($step['icon'] === 'check')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    @elseif($step['icon'] === 'cog')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    @elseif($step['icon'] === 'clock')
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    @endif
                                                </svg>
                                            </div>
                                            <span class="text-xs text-center {{ $currentStep >= array_search($key, array_keys($steps)) ? 'text-gray-800 font-medium' : 'text-gray-500' }}">
                                                {{ $step['name'] }}
                                            </span>
                                        </div>
                                        @if(!$loop->last)
                                            <div class="flex-1 h-1 bg-gray-200 mx-2">
                                                <div class="h-1 bg-green-500" style="width: {{ $currentStep > array_search($key, array_keys($steps)) ? '100%' : ($currentStep == array_search($key, array_keys($steps)) ? '50%' : '0%') }}"></div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Кнопка отмены заказа -->
                        @if($order->status !== 'cancelled' && $order->status !== 'completed')
                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <form action="{{ route('order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите отменить заказ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                        Отменить заказ
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <!-- Товары в заказе -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
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
                </div>

                <!-- Боковая панель -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
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
                            <a href="{{ route('catalog') }}" 
                               class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                Продолжить покупки
                            </a>
                            <a href="{{ route('home') }}" 
                               class="w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-xl font-semibold transition-all duration-200 hover:border-blue-500 hover:text-blue-600 flex items-center justify-center">
                                На главную
                            </a>
                            <a href="{{ route('profile.orders') }}" 
                               class="w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-xl font-semibold transition-all duration-200 hover:border-blue-500 hover:text-blue-600 flex items-center justify-center">
                                Мои заказы
                            </a>
                        </div>

                        <!-- Поддержка -->
                        <div class="mt-6 p-4 bg-blue-50 rounded-xl">
                            <h4 class="font-semibold text-blue-800 mb-2 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Нужна помощь?
                            </h4>
                            <p class="text-blue-700 text-sm">Телефон поддержки: <span class="font-semibold">8-800-123-45-67</span></p>
                            <p class="text-blue-700 text-sm">Email: <span class="font-semibold">support@copymaster.ru</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layout>