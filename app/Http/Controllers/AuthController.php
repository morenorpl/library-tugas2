<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // $request->session()->put('user', Auth::user());
        $request->session()->regenerate();

        return redirect()->intended('/')->with('success', 'Logged in successfully!');
    }

    return back()->withErrors([
        'email' => 'The provided credentials does not match our records.',
    ]);
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(Request $request){

        $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
                'name' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'password' => bcrypt($request->password),
        ]);
    
        return redirect()->route('login')->with('success', 'Account created! Please login.');
    }

    public function logout(Request $request) {

        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        
        // return redirect('./login');
        return redirect()->route('login')->with('success', 'Logged out Successfully!');
    }
    
}
