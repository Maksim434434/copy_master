<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Показать форму входа
    public function showLogin()
    {
        return view('login');
    }

    // Обработка входа
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        // Пытаемся найти пользователя по логину или email
        $user = User::where('login', $credentials['login'])
            ->orWhere('email', $credentials['login'])
            ->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, $request->boolean('remember'));
            return redirect()->intended(route('home'))->with('success', 'Добро пожаловать!');
        }

        return back()->withErrors([
            'login' => 'Неверные учетные данные.',
        ])->onlyInput('login');
    }

    // Показать форму регистрации
    public function showRegister()
    {
        return view('register');
    }

    // Обработка регистрации
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'surname' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rules' => 'required|accepted',
        ], [
            'rules.accepted' => 'Вы должны принять правила регистрации',
            'login.unique' => 'Этот логин уже занят',
            'email.unique' => 'Этот email уже используется',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Регистрация прошла успешно!');
    }

    // Выход из системы
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Вы успешно вышли из системы.');
    }
}