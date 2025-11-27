<x-layout title="Личный кабинет">
    <x-section title="Личный кабинет">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Левая колонка - информация о пользователе -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                        <div class="text-center mb-6">
                            <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="text-white text-2xl font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                            <p class="text-gray-600">{{ Auth::user()->email }}</p>
                        </div>

                        <div class="space-y-4">
                            <a href="{{ route('profile.orders') }}" 
                               class="flex items-center p-3 rounded-xl border border-gray-200 hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-blue-200 transition-colors duration-200">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Мои заказы</p>
                                    <p class="text-sm text-gray-600">История и статусы заказов</p>
                                </div>
                            </a>

                            <a href="{{ route('basket') }}" 
                               class="flex items-center p-3 rounded-xl border border-gray-200 hover:border-green-500 hover:bg-green-50 transition-all duration-200 group">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-green-200 transition-colors duration-200">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Корзина</p>
                                    <p class="text-sm text-gray-600">Товары в корзине</p>
                                </div>
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="pt-4 border-t border-gray-100">
                                @csrf
                                <button type="submit" 
                                        class="flex items-center w-full p-3 rounded-xl border border-gray-200 hover:border-red-500 hover:bg-red-50 transition-all duration-200 group">
                                    <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center mr-3 group-hover:bg-red-200 transition-colors duration-200">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Выйти</p>
                                        <p class="text-sm text-gray-600">Завершить сеанс</p>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Правая колонка - последние заказы -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Последние заказы</h3>
                            <a href="{{ route('profile.orders') }}" 
                               class="text-blue-600 hover:text-blue-800 font-semibold text-sm flex items-center">
                                Все заказы
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        @if($recentOrders->count() > 0)
                            <div class="space-y-4">
                                @foreach($recentOrders as $order)
                                    <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all duration-200">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                            <div class="flex-1">
                                                <div class="flex items-center gap-3 mb-2">
                                                    <span class="text-sm font-semibold text-gray-700">Заказ #{{ $order->id }}</span>
                                                    <span class="px-2 py-1 text-xs rounded-full {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : ($order->status == 'processing' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                        {{ $order->getStatusText() }}
                                                    </span>
                                                </div>
                                                <p class="text-sm text-gray-600 mb-1">
                                                    {{ $order->created_at->format('d.m.Y H:i') }}
                                                </p>
                                               <p class="text-lg font-bold text-gray-800">
                                                    {{ number_format($order->total, 0, ',', ' ') }} ₽
                                                </p>
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('profile.order.details', $order) }}" 
                                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors duration-200">
                                                    Детали
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-8">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-gray-800 mb-2">Заказов пока нет</h4>
                                <p class="text-gray-600 mb-4">Совершите первую покупку в нашем магазине</p>
                                <a href="{{ route('catalog') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors duration-200 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Перейти в каталог
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-section>
</x-layout>