<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;

// Redirige al login como pantalla principal
Route::get('/', function () {
   return redirect('/alumnos');
});


