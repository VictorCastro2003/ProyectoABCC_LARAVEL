<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
public function showLoginForm(Request $request)
{
    $request->session()->regenerateToken(); // Genera nuevo token
    return view('auth.login');
}

public function login(Request $request)
{
    // Limpia sesión previa y regenera token
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Valida credenciales + CSRF
    $credentials = $request->validate([
        'name' => ['required'],
        'password' => ['required'],
        '_token' => ['required'],
    ]);

    if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        $request->session()->regenerate(); // Nueva sesión
        return redirect()->intended('alumnos');
    }

    return back()->withErrors([
        'name' => 'Usuario o contraseña incorrectos.',
    ]);
}
}
