<x-layout title="Оформление заказа">
    <x-section title="Оформление заказа">
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
                            <a href="{{ route('basket') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">Корзина</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Оформление заказа</span>
                        </div>
                    </li>
                </ol>
            </nav>

            @if(empty($products))
                <div class="text-center py-16">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Корзина пуста</h2>
                    <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">Добавьте товары в корзину для оформления заказа</p>
                    <a href="{{ route('catalog') }}" 
                       class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-flex items-center">
                        Перейти в каталог
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Левая колонка - Форма заказа -->
                    <div class="lg:col-span-2">
                        <form action="{{ route('order.store') }}" method="POST" id="checkout-form">
                            @csrf
                            
                            <!-- Контактная информация -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Контактные данные
                                </h2>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Имя *</label>
                                        <input type="text" id="name" name="name" required
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                               value="{{ auth()->user()->name ?? '' }}"
                                               placeholder="Ваше имя">
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Телефон *</label>
                                        <input type="tel" id="phone" name="phone" required
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                               placeholder="+7 (999) 999-99-99">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                        <input type="email" id="email" name="email" required
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                               value="{{ auth()->user()->email ?? '' }}"
                                               placeholder="your@email.com">
                                    </div>
                                </div>
                            </div>

                            <!-- Адрес доставки -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    Адрес доставки
                                </h2>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">Город *</label>
                                        <input type="text" id="city" name="city" required
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                               placeholder="Москва">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Адрес *</label>
                                        <input type="text" id="address" name="address" required
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                                               placeholder="ул. Примерная, д. 123, кв. 45">
                                    </div>
                                </div>
                            </div>

                            <!-- Способ оплаты -->
                            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                                    <svg class="w-6 h-6 mr-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                    </svg>
                                    Способ оплаты
                                </h2>
                                
                                <div class="space-y-4">
                                    <label class="flex items-center p-4 border-2 border-blue-500 rounded-xl cursor-pointer hover:bg-blue-50 transition-colors duration-200">
                                        <input type="radio" name="payment_method" value="card" class="text-blue-600 focus:ring-blue-500" checked>
                                        <div class="ml-4">
                                            <span class="font-semibold text-gray-800">Банковской картой</span>
                                            <p class="text-sm text-gray-600 mt-1">Оплата онлайн банковской картой</p>
                                        </div>
                                    </label>
                                    
                                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors duration-200">
                                        <input type="radio" name="payment_method" value="cash" class="text-blue-600 focus:ring-blue-500">
                                        <div class="ml-4">
                                            <span class="font-semibold text-gray-800">Наличными</span>
                                            <p class="text-sm text-gray-600 mt-1">Оплата наличными при получении</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Правая колонка - Итоги заказа -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-6">
                            <h2 class="text-xl font-bold text-gray-800 mb-6">Ваш заказ</h2>
                            
                            <!-- Список товаров -->
                            <div class="space-y-4 mb-6 max-h-80 overflow-y-auto">
                                @foreach($products as $product)
                                    <div class="flex items-center space-x-3">
                                        <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                                                 class="max-w-full max-h-full object-contain"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.jpg') }}'">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h3 class="font-semibold text-gray-800 text-sm line-clamp-2">{{ $product->name }}</h3>
                                            <p class="text-gray-600 text-sm">{{ $product->formatted_price }} × {{ $product->quantity }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-800">{{ number_format($product->subtotal, 0, ',', ' ') }} ₽</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Итоговая информация -->
                            <div class="border-t border-gray-200 pt-4 space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Товары ({{ count($products) }})</span>
                                    <span class="font-semibold text-gray-800">{{ number_format($total, 0, ',', ' ') }} ₽</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Доставка</span>
                                    <span class="font-semibold text-green-600">Бесплатно</span>
                                </div>
                                <div class="flex justify-between items-center text-lg font-bold pt-3 border-t border-gray-200">
                                    <span>Итого</span>
                                    <span class="text-blue-600">{{ number_format($total, 0, ',', ' ') }} ₽</span>
                                </div>
                            </div>
                            
                            <!-- Кнопка оформления -->
                            <button type="submit" form="checkout-form"
                                    class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-4 px-6 rounded-xl font-semibold text-lg transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center mt-6">
                                Подтвердить заказ
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-section>
</x-layout>