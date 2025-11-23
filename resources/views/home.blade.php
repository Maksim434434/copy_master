<x-layout title="Главная - Copy Master">
    <!-- Герой секция -->
    <section class="bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-20 relative overflow-hidden">
        <!-- Декоративные элементы -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-4000"></div>
        
        <div class="container mx-auto px-4 text-center relative z-10">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                Copy Master
            </h1>
            <p class="text-2xl md:text-3xl text-blue-600 mb-8 max-w-3xl mx-auto font-semibold leading-relaxed">
                Ваш надежный партнер в мире техники
            </p>
            <p class="text-xl text-gray-600 mb-10 max-w-2x2 mx-auto">
                Помогаем нашим клиентам выбирать лучшую технику для дома и офиса
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('catalog') }}" 
                   class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                    Перейти в каталог
                </a>
                <a href="{{ route('about') }}" 
                   class="bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    О компании
                </a>
            </div>
        </div>
    </section>

    <!-- Статистика -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl font-bold text-blue-600 mb-2">5000+</div>
                    <div class="text-gray-600 text-lg font-medium">Проданной техники</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl font-bold text-blue-600 mb-2">5000+</div>
                    <div class="text-gray-600 text-lg font-medium">довольных клиентов</div>
                </div>
                <div class="text-center transform hover:scale-110 transition-transform duration-300">
                    <div class="text-5xl font-bold text-blue-600 mb-2">50+</div>
                    <div class="text-gray-600 text-lg font-medium">мировых брендов</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Популярные категории -->
    <section class="py-16 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Популярные категории</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $categories = [
                        [
                            'name' => 'Смартфоны',
                            'icon' => 'M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z',
                            'description' => 'Современные смартфоны от ведущих брендов'
                        ],
                        [
                            'name' => 'Ноутбуки',
                            'icon' => 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
                            'description' => 'Мощные ноутбуки для работы и игр'
                        ],
                        [
                            'name' => 'Телевизоры',
                            'icon' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                            'description' => 'Телевизоры с премиальным качеством изображения'
                        ],
                        [
                            'name' => 'Планшеты',
                            'icon' => 'M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z',
                            'description' => 'Универсальные планшеты для всей семьи'
                        ],
                        [
                            'name' => 'Наушники',
                            'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            'description' => 'Качественные наушники для музыки и разговоров'
                        ],
                        [
                            'name' => 'Аксессуары',
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'description' => 'Аксессуары и гаджеты для вашей техники'
                        ]
                    ];
                @endphp
                
                @foreach($categories as $category)
                    <a href="{{ route('catalog', ['category' => $category['name']]) }}" 
                       class="bg-white p-8 rounded-2xl shadow-lg border border-blue-100 text-center group hover:transform hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $category['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $category['name'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $category['description'] }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-16">Почему выбирают нас</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $advantages = [
                        [
                            'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            'title' => 'Гарантия качества',
                            'text' => 'На всю технику предоставляем официальную гарантию от производителя'
                        ],
                        [
                            'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1',
                            'title' => 'Лучшие цены',
                            'text' => 'Регулярные акции, скидки и специальные предложения'
                        ],
                        [
                            'icon' => 'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z',
                            'title' => 'Широкий ассортимент',
                            'text' => 'Большой выбор техники от ведущих мировых производителей'
                        ],
                        [
                            'icon' => 'M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129',
                            'title' => 'Быстрая доставка',
                            'text' => 'Доставляем заказы в день оформления по городу и области'
                        ],
                        [
                            'icon' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                            'title' => 'Сервисный центр',
                            'text' => 'Собственный сервисный центр для гарантийного ремонта'
                        ],
                        [
                            'icon' => 'M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.99 1.99 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z',
                            'title' => 'Профессиональные консультации',
                            'text' => 'Поможем выбрать технику под ваши задачи и бюджет'
                        ]
                    ];
                @endphp
                
                @foreach($advantages as $advantage)
                    <div class="bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-2xl shadow-lg border border-blue-100 text-center group hover:transform hover:-translate-y-2 transition-all duration-300 hover:shadow-xl">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $advantage['icon'] }}"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $advantage['title'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $advantage['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Популярные бренды -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Наши бренды</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 items-center">
                @php
                    $brands = ['Apple', 'Samsung', 'Sony', 'LG', 'Xiaomi', 'HP'];
                @endphp
                
                @foreach($brands as $brand)
                    <div class="flex justify-center p-6 bg-white rounded-2xl border border-gray-200 group hover:transform hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                        <span class="font-bold text-gray-700 text-lg group-hover:text-blue-600 transition-colors duration-300">
                            {{ $brand }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Контактная информация -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-3 gap-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Адрес</h3>
                    <p class="text-xl font-bold text-gray-900">г. Усть-Катав</p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Телефон</h3>
                    <p class="text-xl font-bold text-gray-900">8 (800) 535-35-35</p>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Email</h3>
                    <p class="text-xl font-bold text-gray-900">copy_master@email.ru</p>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="{{ route('where') }}" 
                   class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 inline-flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Как нас найти
                </a>
            </div>
        </div>
    </section>

    <!-- Призыв к действию -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Готовы выбрать технику?</h2>
            <p class="text-blue-100 text-lg md:text-xl mb-8 max-w-2xl mx-auto leading-relaxed">
                Ознакомьтесь с нашим каталогом и выберите технику, которая подходит именно вам
            </p>
            <a href="{{ route('catalog') }}" 
               class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-blue-50 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 inline-block shadow-lg">
                Перейти в каталог
            </a>
        </div>
    </section>
</x-layout>

