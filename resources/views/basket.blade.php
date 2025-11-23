<x-layout title="Корзина">
    <x-section title="Корзина">
        <div class="container mx-auto px-4 py-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(empty($products))
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Корзина пуста</h2>
                    <p class="text-gray-600 mb-6">Добавьте товары из каталога</p>
                    <a href="{{ route('catalog') }}" 
                       class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-medium transition-colors">
                        Перейти в каталог
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                            @foreach($products as $product)
                                <div class="flex items-center p-6 border-b border-gray-200 last:border-b-0">
                                    @if($product->image)
                                        <img src="{{ Storage::url($product->image) }}" 
                                             alt="{{ $product->name }}"
                                             class="w-20 h-20 object-cover rounded-lg">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <div class="ml-6 flex-1">
                                        <h3 class="text-lg font-medium text-gray-800">{{ $product->name }}</h3>
                                        <p class="text-gray-600">{{ $product->brand }}</p>
                                        <p class="text-lg font-bold text-blue-600 mt-1">{{ $product->formatted_price }}</p>
                                    </div>
                                    
                                    <div class="flex items-center space-x-4">
                                        <form method="POST" action="{{ route('cart.update', $product) }}">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $product->quantity }}" 
                                                   min="1" max="{{ $product->stock }}"
                                                   class="w-20 px-3 py-2 border border-gray-300 rounded-lg text-center">
                                        </form>
                                        
                                        <form method="POST" action="{{ route('cart.remove', $product) }}">
                                            @csrf
                                            <button type="submit" 
                                                    class="text-red-500 hover:text-red-700 p-2 transition-colors"
                                                    title="Удалить из корзины">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4">
                            <form method="POST" action="{{ route('cart.clear') }}">
                                @csrf
                                <button type="submit" 
                                        class="text-red-600 hover:text-red-800 font-medium transition-colors">
                                    Очистить корзину
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <div>
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 sticky top-4">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Итого</h3>
                            
                            <div class="space-y-2 mb-6">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Товары ({{ count($products) }})</span>
                                    <span class="font-medium">{{ number_format($total, 0, '', ' ') }} ₽</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Доставка</span>
                                    <span class="font-medium">Бесплатно</span>
                                </div>
                                <div class="border-t border-gray-200 pt-2 mt-2">
                                    <div class="flex justify-between text-lg font-bold">
                                        <span>Общая сумма</span>
                                        <span class="text-blue-600">{{ number_format($total, 0, '', ' ') }} ₽</span>
                                    </div>
                                </div>
                            </div>
                            
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-colors shadow-sm">
                                Оформить заказ
                            </button>
                            
                            <a href="{{ route('catalog') }}" 
                               class="block text-center text-blue-600 hover:text-blue-800 mt-4 font-medium">
                                Продолжить покупки
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-section>
</x-layout>