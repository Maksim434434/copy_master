<x-layout title="Где нас найти?">
    <x-section title="Где нас найти?">
        <div class="max-w-6xl mx-auto">
            <!-- Контактная информация -->
            <div class="grid lg:grid-cols-3 gap-8 mb-12">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Адрес</h3>
                    <p class="text-xl font-bold text-gray-900">г. Усть-Катав</p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Телефон</h3>
                    <p class="text-xl font-bold text-gray-900">8 (800) 535-35-35</p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2 uppercase">Email</h3>
                    <p class="text-xl font-bold text-gray-900">copy_master@email.ru</p>
                </div>
            </div>

            <!-- Карта -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <img src="map.jpg" alt="Карта расположения компании Copy Master в г. Усть-Катав" 
                     class="w-full h-96 object-cover">
            </div>

            <!-- Дополнительная информация -->
            <div class="mt-8 text-center">
                <p class="text-gray-600 text-lg">
                    Ждем вас в нашем офисе! Работаем с понедельника по пятницу с 9:00 до 18:00
                </p>
            </div>
        </div>
    </x-section>
</x-layout>