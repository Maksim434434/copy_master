<x-layout title="Регистрация">
    <x-section title="Регистрация">
        <form action="" class="shadow-md grid gap-y-6 p-8 w-full lg:w-2/3 justify-self-center">
        <x-form.div title="Фамилия">
            <input type="text" name="surname" class="border border-gray-200 p-1">
        </x-form.div>
        <x-form.div title="Имя">
            <input type="text" name="name" class="border border-gray-200 p-1">
        </x-form.div>
        <x-form.div title="Логин">
            <input type="text" name="login" class="border border-gray-200 p-1">
            @error('login')
                <x-form.error>Error</x-form.error>
            @enderror
        </x-form.div>
        <x-form.div title="Email">
            <input type="text" name="email" class="border border-gray-200 p-1">
        </x-form.div>
        <x-form.div title="Пароль">
            <input type="password" name="password" class="border border-gray-200 p-1">
            @error('password')
                <x-form.error>Error</x-form.error>
            @enderror
        </x-form.div>
        <x-form.div title="Подтвердите пароль">
            <input type="text" name="password_repeat" class="border border-gray-200 p-1">
            @error('password_repeat')
                <x-form.error>Error</x-form.error>
            @enderror
        </x-form.div>
        <x-form.div title="Согласие с правилами регистрации">
            <input type="checkbox" name="rules" class="border border-gray-200 p-1">
        </x-form.div>
        <x-form.button>Войти</x-form.button>
    </form>
    </x-section>
</x-layout>