<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login() {
        
        if (Auth::check()) {
            return redirect()->route('users.index');
        }
        return view('login.login');
    }

    public function register() {

        if (Auth::check()) {
            return redirect()->route('users.index');
        }

        return view('login.register');
    }

    public function auth(Request $request) {

        $validated = $request->validate([
            'email' => ['string', 'required', 'email'],
            'password' => ['string', 'required'],
            'remember' => ['nullable'],
        ]);

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ];

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return redirect()->route('users.index')->with('success', "Добро пожаловать $user->name");
        }

        return back()->withErrors([
            'error' => 'Неправильный email или пароль',
        ]);

    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();

        return redirect()->route('login.login');
    }
}
