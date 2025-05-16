<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Books;
use App\Models\User;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthController;

// Books Resource Routes
Route::resource('books', BooksController::class)->middleware('isLoggedIn');

// Dashboard Route
Route::get('/', function () {
    $books = Books::all();
    return view('dashboard.index', compact('books'));
})->middleware(\App\Http\Middleware\IsLoggedIn::class)->name('dashboard');

// Login Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');

// Register Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.post')->middleware('guest');

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/test-login', function () {
    $user = User::first();

    if ($user) {
        Auth::login($user);
        return 'User is now logged in: ' . Auth::user()->name;
    }

    return 'No user found in the database';
});