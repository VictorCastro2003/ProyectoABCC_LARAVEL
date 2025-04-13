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
        $validated = $request->validate([
            'numControl' => 'required|unique:alumnos|max:20',
            'nombre' => 'required|string|max:50',
            'primerAp' => 'required|string|max:50',
            'segundoAp' => 'nullable|string|max:50',
            'fechaNac' => 'required|date',
            'semestre' => 'required|integer|min:1|max:12',
            'carrera' => 'required|string|max:100'
        ]);

        Alumno::create($validated);
        
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno agregado correctamente');
    }

    // -------- BAJAS --------
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno eliminado correctamente');
    }

    // -------- CAMBIOS --------
    public function edit(Alumno $alumno)
    {
        return view('editar', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $validated = $request->validate([
            'numControl' => 'required|max:20|unique:alumnos,numControl,'.$alumno->id,
            'nombre' => 'required|string|max:50',
            'primerAp' => 'required|string|max:50',
            'segundoAp' => 'nullable|string|max:50',
            'fechaNac' => 'required|date',
            'semestre' => 'required|integer|min:1|max:12',
            'carrera' => 'required|string|max:100'
        ]);

        $alumno->update($validated);
        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno actualizado correctamente');
    }

    // -------- CONSULTAS --------
    public function index()
    {
        $alumnos = Alumno::orderBy('fechaNac', 'desc')->paginate(5);
        return view('index', compact('alumnos'));
    }

    public function show(Alumno $alumno)
    {
        return view('detalle', compact('alumno'));
    }
}
