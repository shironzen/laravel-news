<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'role_id' => 1, // По умолчанию Читатель
        ]);

        Auth::login($user);
        return redirect('/');
    }

    
    public function showLogin()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors([
            'login' => 'Неверный логин или пароль',
        ]);
    }

    // 5. Выход
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}