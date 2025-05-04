<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;

Route::middleware('web')->group(function () {
    // Landing Page
    Route::get('/', function () {
        return view('landing');
    })->name('landing');

    // Rutas de autenticación
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rutas de registro
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Rutas protegidas (requiere autenticación)
    Route::middleware('auth')->group(function () {
        Route::resource('alumnos', AlumnoController::class);
    });
});
