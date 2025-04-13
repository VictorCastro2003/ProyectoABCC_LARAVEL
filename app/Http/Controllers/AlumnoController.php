<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    // -------- ALTAS --------
    public function create()
    {
        return view('insertar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numControl' => 'required',
            'nombre' => 'required',
            'primerAp' => 'required',
            'segundoAp' => 'required',
            'fechaMac' => 'required|date',
            'semestre' => 'required|numeric',
            'carrera' => 'required'
        ]);

        Alumno::create($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumno agregado correctamente');
    }

    // -------- BAJAS --------
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente');
    }

    // -------- CAMBIOS --------
    public function edit(Alumno $alumno)
    {
        return view('editar', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'numControl' => 'required',
            'nombre' => 'required',
            'primerAp' => 'required',
            // ... otras validaciones
        ]);

        $alumno->update($request->all());
        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente');
    }

    // -------- CONSULTAS --------
    public function index()
    {
        $alumnos = Alumno::latest()->paginate(5);
        return view('index', compact('alumnos'));
    }

    public function show(Alumno $alumno)
    {
        return view('detalle', compact('alumno'));
    }
}
