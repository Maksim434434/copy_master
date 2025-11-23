<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'surname',
        'name',
        'login',
        'email',
        'password',
        'role', // Добавьте это поле
    ];

    protected $hidden = [
        'password',
        'remember_token', // Добавьте это
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * Проверка является ли пользователь администратором
     */
    public function isAdmin(): bool
    {
        // Проверяем и по логину и по роли для надежности
        return $this->login === 'admin' || $this->role === 'admin';
    }

    /**
     * Override метода для поиска по логину или email
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('id', $value)
            ->orWhere('login', $value)
            ->orWhere('email', $value)
            ->first();
    }
}