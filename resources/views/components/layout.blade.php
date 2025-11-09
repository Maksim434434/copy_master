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
                            <x-link href="{{ route('basket') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
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