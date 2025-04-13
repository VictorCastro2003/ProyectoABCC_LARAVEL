@extends('adminlte::page')

@section('title', 'Listado de Alumnos')

@section('content_header')
    <h1 class="m-0 text-dark">SERVICIOS ESCOLARES - Listado de Alumnos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Alumnos Registrados</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('alumnos.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i> AGREGAR ALUMNO
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>N° Control</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->Num_Control }}</td>
                            <td>{{ $alumno->Nombre }}</td>
                            <td>{{ $alumno->Primer_Ap }}</td>
                            <td>{{ $alumno->Segundo_Ap }}</td>
                            <td style="white-space: nowrap;">
                                <a href="{{ route('alumnos.show', $alumno->Num_Control) }}" 
                                   class="btn btn-sm btn-primary" title="Ver detalle">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('alumnos.edit', $alumno->Num_Control) }}" 
                                   class="btn btn-sm btn-warning" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" 
                                      class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card-footer clearfix">
            {{ $alumnos->links() }} <!-- Paginación -->
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table th {
            background-color: #f8f9fa;
            vertical-align: middle;
        }
        .card-title {
            margin-bottom: 0;
        }
        .form-eliminar {
            display: inline-block;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.form-eliminar').on('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: '¿Eliminar alumno?',
                    text: "¡Esta acción no se puede deshacer!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@stop
