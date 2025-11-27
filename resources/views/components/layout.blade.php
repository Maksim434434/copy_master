<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="flex flex-col h-screen bg-gray-50">
    <header class="bg-white shadow-sm border-b border-gray-200">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Логотип -->
                <div>
                    <x-link href="{{ route('home') }}" class="flex items-center gap-x-3 text-gray-800 hover:text-blue-600 transition-colors">
                        <img src="logo.png" alt="Copy Master" class="h-8 w-8 rounded-lg">
                        <span class="text-xl font-bold">Copy Master</span>
                    </x-link>
                </div>
                
                <!-- Навигация -->
                <nav class="flex gap-x-8">
                    <x-link href="{{ route('about') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        О нас
                    </x-link>
                    <x-link href="{{ route('catalog') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        Каталог
                    </x-link>
                    <x-link href="{{ route('where') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                        Где нас найти?
                    </x-link>
                </nav>
                
                <!-- Правая часть -->
                <ul class="flex gap-x-6 items-center">
                    @guest
                        <li>
                            <x-link href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                Регистрация
                            </x-link>
                        </li>
                        <li>
                            <x-link href="{{ route('login') }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors shadow-sm">
                                Аутентификация
                            </x-link>
                        </li>
                    @endguest
                    @auth
                        <li>
                            <x-link href="{{ route('profile') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors flex items-center gap-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Личный кабинет
                            </x-link>
                        </li>
                        <li>
                            <x-link href="{{ route('basket') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors flex items-center gap-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Корзина
                            </x-link>
                        </li>
                        @if(Auth::user()->isAdmin())
                            <li>
                                <x-link href="{{ route('admin.index') }}" 
                                       class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition-colors">
                                    Админка
                                </x-link>
                            </li>
                        @endif
                        <li>
                            <x-link href="{{ route('logout.get') }}" 
                                   class="text-gray-600 hover:text-red-600 font-medium transition-colors flex items-center gap-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>Выход</span>
                                <span class="text-sm text-gray-500">({{ Auth::user()->name }})</span>
                            </x-link>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </header>

    <main class="flex-grow">
        {{ $slot }}
    </main>

    <footer class="bg-blue-800 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p class="text-lg font-semibold">Copy Master</p>
            <p class="text-white-500 text-sm mt-4">&copy; 2025 Все права защищены</p>
        </div>
    </footer>
</body>
</html>