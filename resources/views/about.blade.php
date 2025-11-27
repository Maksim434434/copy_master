<x-layout title="О нас">
    <x-section title="О нас">
        <!-- Герой секция -->
        <div class="bg-gradient-to-br from-blue-50 to-white py-16 border-b border-blue-100">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6 bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Copy Master</h1>
                <div class="flex justify-center space-x-8">
                     <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">5000+</div>
                        <div class="text-gray-600 text-sm">проданной техники</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">5000+</div>
                        <div class="text-gray-600 text-sm">довольных клиентов</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-blue-600">50+</div>
                        <div class="text-gray-600 text-sm">брендов</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- О компании -->
        <div class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-12 items-start">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 mb-6">О нашем магазине</h2>
                        <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                            Магазин "Copy Master" был основан в 2024 году и за время работы зарекомендовал себя 
                            как надежный поставщик качественной электроники и бытовой техники. Мы специализируемся 
                            на продаже смартфонов, ноутбуков, телевизоров, аудиотехники и другой электроники.
                        </p>
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                            Наша миссия - сделать современные технологии доступными для каждого, предоставляя 
                            лучшие товары по конкурентным ценам с гарантией качества и профессиональным сервисом.
                        </p>
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">Наши принципы:</h3>
                            <ul class="space-y-2 text-gray-600">
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Только оригинальная техника от официальных поставщиков
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Честные цены без скрытых наценок
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Профессиональные консультации по подбору техники
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Гарантийное и постгарантийное обслуживание
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Наш ассортимент</h3>
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Смартфоны и планшеты</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Ноутбуки и компьютеры</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Телевизоры и аудио</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Фото и видео техника</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Бытовая техника</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <span class="text-gray-600">Аксессуары и гаджеты</span>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <img src="cp.webp" alt="Наш магазин" class="rounded-lg shadow-md h-40 w-full object-cover">
                            <img src="cm.webp" alt="Наша команда" class="rounded-lg shadow-md h-40 w-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Преимущества -->
        <div class="py-16 bg-blue-50">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Почему выбирают нас</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Гарантия качества</h3>
                        <p class="text-gray-600 text-sm">На всю технику предоставляем официальную гарантию от производителя</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Лучшие цены</h3>
                        <p class="text-gray-600 text-sm">Регулярные акции, скидки и специальные предложения для наших клиентов</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Широкий ассортимент</h3>
                        <p class="text-gray-600 text-sm">Большой выбор техники от ведущих мировых производителей</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Быстрая доставка</h3>
                        <p class="text-gray-600 text-sm">Доставляем заказы в день оформления по городу и области</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Сервисный центр</h3>
                        <p class="text-gray-600 text-sm">Собственный сервисный центр для гарантийного и постгарантийного ремонта</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-blue-100 text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.99 1.99 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Профессиональные консультации</h3>
                        <p class="text-gray-600 text-sm">Наши специалисты помогут выбрать технику под ваши задачи и бюджет</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Бренды -->
        <div class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Мы работаем с лучшими брендами</h2>
                <div class="grid grid-cols-3 md:grid-cols-6 gap-6 items-center">
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">Apple</span>
                    </div>
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">Samsung</span>
                    </div>
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">Sony</span>
                    </div>
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">LG</span>
                    </div>
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">Xiaomi</span>
                    </div>
                    <div class="flex justify-center p-4 bg-gray-50 rounded-lg">
                        <span class="font-semibold text-gray-700">HP</span>
                    </div>
                </div>
            </div>
        </div>

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
    </x-section>
</x-layout>