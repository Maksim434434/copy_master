<x-layout title="{{ $product->name }}">
    <x-section title="{{ $product->name }}">
        <div class="container mx-auto px-4 py-8">
            <!-- Уведомление о добавлении в корзину -->
            @if(session('success'))
                <div class="fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in-down">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Хлебные крошки -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('catalog') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Каталог
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Изображение товара -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <div class="w-full h-96 bg-white rounded-lg overflow-hidden flex items-center justify-center p-8">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                            class="max-w-full max-h-full object-contain"
                            onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.jpg') }}'"
                            loading="eager">
                    </div>
                </div>
                
                <!-- Информация о товаре -->
                <div class="bg-white rounded-lg border border-gray-200 p-6">
                    <!-- Категория и бренд -->
                    <div class="flex items-center gap-3 mb-4">
                        <span class="bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                            {{ $product->category }}
                        </span>
                        <span class="text-gray-600 text-sm">{{ $product->brand }}</span>
                    </div>
                    
                    <!-- Название -->
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                    
                    <!-- Цена и наличие -->
                    <div class="mb-6">
                        @if($product->old_price && $product->old_price > $product->price)
                            <div class="flex items-center gap-3 mb-2">
                                <span class="text-3xl font-bold text-gray-800">{{ $product->formatted_price }}</span>
                                <span class="text-lg text-gray-500 line-through">{{ number_format($product->old_price, 0, ',', ' ') }} ₽</span>
                                <span class="bg-red-100 text-red-800 text-sm px-2 py-1 rounded">-{{ round(($product->old_price - $product->price) / $product->old_price * 100) }}%</span>
                            </div>
                        @else
                            <div class="text-3xl font-bold text-gray-800 mb-2">{{ $product->formatted_price }}</div>
                        @endif
                        
                        <div class="flex items-center gap-2">
                            <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                                {{ $product->stock > 0 ? '✓ В наличии' : '✗ Нет в наличии' }}
                            </span>
                            @if($product->stock > 0)
                                <span class="text-sm text-gray-600">• Доставка завтра</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Описание -->
                    <div class="mb-6">
                        <h3 class="font-semibold text-gray-800 mb-2">Описание</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                    
                    <!-- Кнопки действий -->
                    <div class="space-y-3">
                        @if($product->stock > 0)
                            <form method="POST" action="{{ route('cart.add', $product) }}">
                                @csrf
                                <button type="submit" 
                                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Добавить в корзину
                                </button>
                            </form>
                        @else
                            <button disabled
                                    class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-semibold cursor-not-allowed">
                                Товар отсутствует
                            </button>
                        @endif
                        
                        <a href="{{ route('catalog') }}" 
                           class="w-full border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold transition-colors duration-200 hover:border-blue-500 hover:text-blue-600 text-center block flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Назад к каталогу
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Характеристики -->
            @php
                $specifications = $product->specifications_array;
            @endphp
            
            @if(!empty($specifications))
                <div class="mt-8 bg-white rounded-lg border border-gray-200 p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Характеристики</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($specifications as $key => $value)
                            <div class="flex justify-between items-center py-3 border-b border-gray-100">
                                <span class="text-gray-600 font-medium">{{ $key }}</span>
                                <span class="text-gray-800 font-semibold text-right">{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            
            <!-- Описание -->
            <div class="mt-8 bg-white rounded-lg border border-gray-200 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Подробное описание</h2>
                <div class="prose max-w-none text-gray-600">
                    <p>{{ $product->description }}</p>
                    <!-- Можно добавить больше контента о товаре -->
                </div>
            </div>
        </div>
    </x-section>
</x-layout>