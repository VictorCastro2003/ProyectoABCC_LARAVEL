<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            padding-top: 20px;
            background-color: #f8f9fa;
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .page-header {
            margin-bottom: 30px;
        }
        .action-buttons .btn {
            margin: 0 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="text-center">SERVICIOS ESCOLARES</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item">Inicio</li>
                    <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
                </ol>
            </nav>
        </div>

        <div class="table-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Listado de Alumnos</h2>
                <a href="{{ route('alumnos.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> AGREGAR
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Número de Control</th>
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
                            <td class="action-buttons">
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
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.form-eliminar');
            forms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: '¿Eliminar registro?',
                        text: "¡Esta acción no se puede deshacer!",
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
</body>
</html>
