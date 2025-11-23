<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Удаляем существующего администратора если есть
        User::where('email', 'admin@example.com')->delete();

        // Создаем администратора
        User::create([
            'surname' => 'Admin',
            'name' => 'Admin',
            'login' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin00'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        $this->command->info('Администратор создан: логин - admin, пароль - admin00');
        $this->command->info('Роль: admin');
    }
}