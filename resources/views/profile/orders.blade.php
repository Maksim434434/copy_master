<x-layout title="Мои заказы">
    <x-section title="Мои заказы">
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
                        <h2 class="text-2xl font-bold text-gray-800 mb-6">История заказов</h2>

                        @if($orders->count() > 0)
                            <div class="space-y-4">
                                @foreach($orders as $order)
                                    <div class="border border-gray-200 rounded-xl p-6 hover:shadow-lg transition-all duration-200">
                                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-4">
                                            <div class="flex-1">
                                                <div class="flex flex-wrap items-center gap-3 mb-2">
                                                    <h3 class="text-lg font-bold text-gray-800">Заказ #{{ $order->id }}</h3>
                                                    <span class="px-3 py-1 text-sm rounded-full {{ $order->status == 'completed' ? 'bg-green-100 text-green-800' : ($order->status == 'processing' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                                        {{ $order->getStatusText() }}
                                                    </span>
                                                </div>
                                                <p class="text-gray-600 mb-1">
                                                    <span class="font-semibold">Дата:</span> 
                                                    {{ $order->created_at->format('d.m.Y H:i') }}
                                                </p>
                                                <p class="text-gray-600">
                                                    <span class="font-semibold">Товаров:</span> 
                                                    {{ $order->items->count() }} шт.
                                                </p>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-2xl font-bold text-gray-800 mb-2">
                                                    {{ number_format($order->total, 0, ',', ' ') }} ₽
                                                </p>
                                                <a href="{{ route('profile.order.details', $order) }}" 
                                                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-semibold transition-colors duration-200 inline-flex items-center">
                                                    Подробнее
                                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Краткий список товаров -->
                                        <div class="border-t border-gray-100 pt-4">
                                            <div class="flex flex-wrap gap-2">
                                                @foreach($order->items->take(3) as $item)
                                                    <div class="flex items-center gap-2 bg-gray-50 rounded-lg px-3 py-2">
                                                        @if($item->product)
                                                            <span class="text-sm text-gray-700">{{ $item->product->name }}</span>
                                                            <span class="text-xs text-gray-500">×{{ $item->quantity }}</span>
                                                        @else
                                                            <span class="text-sm text-gray-500">Товар удален</span>
                                                        @endif
                                                    </div>
                                                @endforeach
                                                @if($order->items->count() > 3)
                                                    <div class="bg-gray-100 rounded-lg px-3 py-2">
                                                        <span class="text-sm text-gray-600">+{{ $order->items->count() - 3 }} ещё</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Пагинация -->
                            <div class="mt-8">
                                {{ $orders->links() }}
                            </div>
                        @else
                            <div class="text-center py-12">
                                <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 mb-3">Заказов пока нет</h3>
                                <p class="text-gray-600 mb-6 max-w-md mx-auto">Вы еще не совершали покупок в нашем магазине. Самое время это исправить!</p>
                                <a href="{{ route('catalog') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors duration-200 inline-flex items-center">
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