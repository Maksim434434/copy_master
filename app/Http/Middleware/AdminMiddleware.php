<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Проверяем, что пользователь аутентифицирован и является администратором
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Пожалуйста, войдите в систему');
        }

        // Проверяем роль администратора (используем поле role)
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }

        return $next($request);
    }
}