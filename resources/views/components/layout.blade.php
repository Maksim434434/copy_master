<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
<<<<<<< HEAD
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
=======
    <script src="{{ asset('public/tailwindcss.js') }}"></script>
>>>>>>> cbde107b0554aeaf4e3c1face53195bd05da6bd1
</head>
<body class="flex flex-col h-screen">
    <header class="flex gap-x-4 justify-between px-4 py-2 border-b border-b-gray-200">
        <div>
            <x-link href="{{ route('home') }}" class="flex items-center gap-x-2">
<<<<<<< HEAD
            <img src="logo.png" alt="" class="h-6 w-6">
=======
            <img src="{{ asset('public/logo.png') }}" alt="" class="h-6 w-6">
>>>>>>> cbde107b0554aeaf4e3c1face53195bd05da6bd1
                Copy Master</x-link>
        </div>
        <nav class="flex gap-x-4">
            <x-link href="{{ route('about') }}">О нас</x-link>
            <x-link href="{{ route('catalog') }}">Каталог</x-link>
            <x-link href="{{ route('where') }}">Где нас найти?</x-link>
        </nav>
        <ul class="flex gap-x-4">
            @guest
                <li><x-link href="{{ route('register') }}">Регистрация</x-link></li>
                <li><x-link href="{{ route('login') }}">Аутентификация</x-link></li>
            @endguest
            @auth
                <li><x-link href="{{ route('basket') }}">Корзина</x-link></li>
<<<<<<< HEAD
                <li>
                    <x-link href="{{ route('logout.get') }}">Выход</x-link>
                </li>
=======
                <li><x-link href="">Выход</x-link></li>
>>>>>>> cbde107b0554aeaf4e3c1face53195bd05da6bd1
            @endauth
        </ul>
    </header>
    <main class="flex-grow">
        {{ $slot }}
    </main>
    <footer>footer</footer>
</body>
</html>
