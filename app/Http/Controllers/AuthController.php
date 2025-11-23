<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        $login = $request->input('login');
        $password = $request->input('password');

        // Ищем пользователя
        $user = User::where('login', $login)
                   ->orWhere('email', $login)
                   ->first();

        if ($user) {
            // Проверяем пароль
            if (Hash::check($password, $user->password)) {
                Auth::login($user, $request->boolean('remember'));
                
                if ($user->isAdmin()) {
                    return redirect()->route('admin.index')->with('success', 'Добро пожаловать в админ панель!');
                }
                
                return redirect()->intended('/')->with('success', 'Добро пожаловать!');
            } else {
                // Логируем для отладки
                Log::info('Неверный пароль для пользователя', ['login' => $login]);
            }
        } else {
            // Логируем для отладки
            Log::info('Пользователь не найден', ['login' => $login]);
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль.',
        ])->withInput($request->only('login'));
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rules' => 'required|accepted',
        ]);

        $user = User::create([
            'surname' => $validated['surname'],
            'name' => $validated['name'],
            'login' => $validated['login'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'Регистрация прошла успешно!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Вы успешно вышли из системы.');
    }
}