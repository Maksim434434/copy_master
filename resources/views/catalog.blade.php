<x-layout title="Каталог техники">
    <x-section title="Каталог техники">
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

            <!-- Фильтры и сортировка -->
            <form method="GET" action="{{ route('catalog') }}">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-8">
                    <div class="flex flex-col lg:flex-row gap-6 items-start lg:items-end">
                        <!-- Левая часть - фильтры -->
                        <div class="flex flex-col sm:flex-row gap-4 flex-1">
                            <!-- Категория -->
                            <div class="flex-1">
                                <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    Категория
                                </label>
                                <select name="category" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white hover:border-gray-300">
                                    <option value="">Все категории</option>
                                    <option value="Смартфоны" {{ request('category') == 'Смартфоны' ? 'selected' : '' }}>Смартфоны</option>
                                    <option value="Ноутбуки" {{ request('category') == 'Ноутбуки' ? 'selected' : '' }}>Ноутбуки</option>
                                    <option value="Телевизоры" {{ request('category') == 'Телевизоры' ? 'selected' : '' }}>Телевизоры</option>
                                    <option value="Планшеты" {{ request('category') == 'Планшеты' ? 'selected' : '' }}>Планшеты</option>
                                    <option value="Наушники" {{ request('category') == 'Наушники' ? 'selected' : '' }}>Наушники</option>
                                </select>
                            </div>
                            
                            <!-- Бренд -->
                            <div class="flex-1">
                                <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                    </svg>
                                    Бренд
                                </label>
                                <select name="brand" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white hover:border-gray-300">
                                    <option value="">Все бренды</option>
                                    <option value="Apple" {{ request('brand') == 'Apple' ? 'selected' : '' }}>Apple</option>
                                    <option value="Samsung" {{ request('brand') == 'Samsung' ? 'selected' : '' }}>Samsung</option>
                                    <option value="Xiaomi" {{ request('brand') == 'Xiaomi' ? 'selected' : '' }}>Xiaomi</option>
                                    <option value="Sony" {{ request('brand') == 'Sony' ? 'selected' : '' }}>Sony</option>
                                    <option value="LG" {{ request('brand') == 'LG' ? 'selected' : '' }}>LG</option>
                                </select>
                            </div>

                            <!-- Сортировка -->
                            <div class="flex-1">
                                <label class="block text-sm font-semibold text-gray-800 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                    </svg>
                                    Сортировка
                                </label>
                                <select name="sort" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white hover:border-gray-300">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Сначала новые</option>
                                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена по возрастанию</option>
                                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена по убыванию</option>
                                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название А-Я</option>
                                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название Я-А</option>
                                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>По популярности</option>
                                </select>
                            </div>
                        </div>

                        <!-- Правая часть - кнопки -->
                        <div class="flex gap-3">
                            <button type="submit" 
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                Применить
                            </button>
                            <a href="{{ route('catalog') }}" 
                               class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Сбросить
                            </a>
                        </div>
                    </div>

                    <!-- Активные фильтры -->
                    @if(request()->hasAny(['category', 'brand', 'sort']) && ($products->count() > 0 || request()->hasAny(['category', 'brand', 'sort'])))
                    <div class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="text-sm font-semibold text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Активные фильтры:
                            </span>
                            @if(request('category'))
                                <span class="bg-blue-50 border border-blue-200 text-blue-700 text-sm px-3 py-2 rounded-lg font-medium flex items-center group hover:bg-blue-100 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    {{ request('category') }}
                                    <a href="{{ request()->fullUrlWithQuery(['category' => null]) }}" class="ml-2 text-blue-400 hover:text-blue-600 transition-colors duration-200 group-hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if(request('brand'))
                                <span class="bg-purple-50 border border-purple-200 text-purple-700 text-sm px-3 py-2 rounded-lg font-medium flex items-center group hover:bg-purple-100 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                                    </svg>
                                    {{ request('brand') }}
                                    <a href="{{ request()->fullUrlWithQuery(['brand' => null]) }}" class="ml-2 text-purple-400 hover:text-purple-600 transition-colors duration-200 group-hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </a>
                                </span>
                            @endif
                            @if(request('sort') && request('sort') != 'newest')
                                @php
                                    $sortLabels = [
                                        'newest' => 'Сначала новые',
                                        'price_asc' => 'Цена по возрастанию', 
                                        'price_desc' => 'Цена по убыванию',
                                        'name_asc' => 'Название А-Я',
                                        'name_desc' => 'Название Я-А',
                                        'popular' => 'По популярности'
                                    ];
                                @endphp
                                <span class="bg-green-50 border border-green-200 text-green-700 text-sm px-3 py-2 rounded-lg font-medium flex items-center group hover:bg-green-100 transition-colors duration-200">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h9m5-4v12m0 0l-4-4m4 4l4-4"/>
                                    </svg>
                                    {{ $sortLabels[request('sort')] ?? request('sort') }}
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="ml-2 text-green-400 hover:text-green-600 transition-colors duration-200 group-hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </a>
                                </span>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </form>

            <!-- Информация о результатах -->
            @if($products->count() > 0)
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl border border-blue-100">
                    <div class="flex items-center mb-3 sm:mb-0">
                        <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-lg font-bold text-gray-800">Найдено товаров: {{ $products->total() }}</p>
                            <p class="text-sm text-gray-600">Показано {{ $products->count() }} из {{ $products->total() }}</p>
                        </div>
                    </div>
                    
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.products.index') }}" 
                               class="bg-white hover:bg-gray-50 text-gray-800 border-2 border-gray-200 px-6 py-3 rounded-xl font-semibold transition-all duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Управление товарами
                            </a>
                        @endif
                    @endauth
                </div>

                <!-- Сетка товаров в стиле DNS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach($products as $product)
                        <!-- Карточка товара в стиле DNS -->
                        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-all duration-200 flex flex-col h-full group">
                            <!-- Изображение товара -->
                            <div class="relative bg-white p-4 flex items-center justify-center h-48">
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                                    class="max-w-full max-h-full object-contain group-hover:scale-105 transition-transform duration-300"
                                    onerror="this.onerror=null; this.src='{{ asset('images/placeholder-product.jpg') }}'"
                                    loading="lazy">
                                
                                <!-- Бейдж скидки -->
                                @if($product->discount > 0)
                                    <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                        -{{ $product->discount }}%
                                    </div>
                                @endif
                                
                                <!-- Бейдж категории -->
                                <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs px-2 py-1 rounded">
                                    {{ $product->category }}
                                </div>
                            </div>
                            
                            <!-- Информация о товаре -->
                            <div class="p-4 flex flex-col flex-1">
                                <!-- Бренд -->
                                <div class="text-sm text-gray-500 mb-1">{{ $product->brand }}</div>
                                
                                <!-- Название -->
                                <h3 class="font-semibold text-gray-800 mb-2 line-clamp-2 leading-tight group-hover:text-blue-600 transition-colors duration-200">
                                    <a href="{{ route('product.show', $product->id) }}" class="hover:no-underline">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                
                                <!-- Цена -->
                                <div class="mt-auto">
                                    @if($product->old_price && $product->old_price > $product->price)
                                        <div class="flex items-center gap-2 mb-1">
                                            <span class="text-2xl font-bold text-gray-800">{{ $product->formatted_price }}</span>
                                            <span class="text-sm text-gray-500 line-through">{{ number_format($product->old_price, 0, ',', ' ') }} ₽</span>
                                        </div>
                                    @else
                                        <div class="text-2xl font-bold text-gray-800 mb-1">{{ $product->formatted_price }}</div>
                                    @endif
                                    
                                    <!-- Статус наличия и кнопка корзины -->
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                                            {{ $product->stock > 0 ? 'В наличии' : 'Нет в наличии' }}
                                        </span>
                                        
                                        <!-- Кнопка корзины -->
                                        @if($product->stock > 0)
                                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                                @csrf
                                                <button type="submit" 
                                                        class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-colors duration-200 flex items-center justify-center w-10 h-10">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            <button disabled
                                                    class="bg-gray-300 text-gray-500 p-2 rounded-lg cursor-not-allowed w-10 h-10 flex items-center justify-center">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Пагинация -->
                @if($products->hasPages())
                    <div class="mt-8">
                        {{ $products->withQueryString()->links() }}
                    </div>
                @endif
                
            @else
                <!-- Блок "Товары не найдены" -->
                <div class="text-center py-16">
                    <div class="w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-3xl flex items-center justify-center mx-auto mb-8 shadow-lg">
                        <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Товары не найдены</h2>
                    <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">Попробуйте изменить параметры фильтрации или сбросить фильтры</p>
                    
                    @if(request()->hasAny(['category', 'brand', 'sort']))
                        <a href="{{ route('catalog') }}" 
                           class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-flex items-center mb-6">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Сбросить фильтры
                        </a>
                    @endif
                    
                    @auth
                        @if(auth()->user()->isAdmin())
                            <div class="pt-6 border-t border-gray-200 mt-6">
                                <a href="{{ route('admin.products.create') }}" 
                                   class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-green-800 text-white px-10 py-4 rounded-xl font-semibold transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 inline-flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Добавить первый товар
                                </a>
                            </div>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </x-section>
</x-layout>