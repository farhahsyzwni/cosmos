<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/tasks', function () {
    return view('tasks');
});


Route::get('/sessions', [SessionController::class, 'index'])->name('sessions');
Route::post('/sessions', [SessionController::class, 'create'])->name('sessions.create');
Route::get('/sessions/{session_token}', [SessionController::class, 'show'])->name('sessions.show');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
