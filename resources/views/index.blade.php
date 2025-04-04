@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard - ALUMNOS</h1>
@stop

@section('content')

<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav me-auto">
        <li class="nav-item active">
            <a class="nav-link" href="#">INICIO</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Asignaturas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Docentes</a>
        </li>
    </ul>
</div>
</div>
</nav>
</header>

<div class="container mt-5 mb-5">
    <h1 class="text-center mt-5">SERVICIOS ESCOLARES</h1>
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
            <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
        </ol>
    </nav>

    <div class="panel-heading">
        <h2>Listado de Alumnos</h2>
    </div>

    <a href="{{ route('alumnos.create') }}" class="btn btn-success mt-4">AGREGAR</a>
    
    <div class="table-responsive mt-4">
        <table class='table table-striped table-bordered text-center'>
            <thead>
                <tr>
                    <th>Numero de Control</th>
                    <th>Nombre</th>
                    <th>Primer Ap</th>
                    <th>Segundo Ap</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->Num_Control }}</td>
                    <td>{{ $alumno->Nombre }}</td>
                    <td>{{ $alumno->Primer_Ap }}</td>
                    <td>{{ $alumno->Segundo_Ap }}</td>
                    <td>
                        <a href="{{ route('alumnos.show', $alumno->Num_Control) }}" class="btn btn-primary btn-sm">Detalle</a>
                        <a href="{{ route('alumnos.edit', $alumno->Num_Control) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline;" class="form-eliminar">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <!-- Incluimos SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.form-eliminar');
            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: '¿Seguro que quieres eliminar este registro?',
                        text: "Esta acción no se puede deshacer",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
