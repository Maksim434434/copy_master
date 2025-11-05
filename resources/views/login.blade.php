<x-layout title="Аутентификация">
    <x-section title="Аутентификация">
    <form action="" class="shadow-md grid gap-y-6 p-8 w-full lg:w-2/3 justify-self-center">
        <x-form.div title="Логин">
            <input type="text" name="login" class="border border-gray-200 p-1">
            <x-form.error>Error</x-form.error>
        </x-form.div>
        <x-form.div title="Пароль">
            <input type="password" name="password" class="border border-gray-200 p-1">
            <x-form.error>Error</x-form.error>
        </x-form.div>
        <x-form.button>Войти</x-form.button>
    </form>
    </x-section>
</x-layout>