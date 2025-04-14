<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $request->session()->regenerateToken(); // Genera nuevo token CSRF
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Limpia sesión previa completamente
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Validación de campos (el _token se verifica automáticamente)
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Protección contra fijación de sesión
            return redirect()->intended('alumnos');
        }

        return back()->withErrors([
            'name' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
