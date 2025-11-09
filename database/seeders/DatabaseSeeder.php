<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

    {
        // Проверяем, не существует ли уже пользователь admin
        if (!User::where('login', 'admin')->exists()) {
            User::create([
                'surname' => 'Admin',
                'name' => 'Administrator',
                'login' => 'admin',
                'email' => 'admin@copymaster.ru',
                'password' => Hash::make('admin00'),
            ]);
            $this->command->info('Администратор создан: login: admin, password: admin00');
        } else {
            $this->command->info('Пользователь admin уже существует');
        }
    }
    }
}
