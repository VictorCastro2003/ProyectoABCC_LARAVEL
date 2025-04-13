<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para íconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .btn-action {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 3px;
        }
        .user-dropdown {
            min-width: 200px;
        }
        .user-dropdown .dropdown-item {
            padding: 0.5rem 1.5rem;
        }
        .user-dropdown .dropdown-header {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

<header class="bg-primary text-white p-3">
    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Dashboard - ALUMNOS</h1>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle me-2 fs-4"></i>
                <span>Usuario</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end user-dropdown" aria-labelledby="userDropdown">
                <li><h6 class="dropdown-header">usuario@ejemplo.com</h6></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Perfil</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Configuración</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt me-2"></i> Cerrar sesión
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Servicios Escolares</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
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

<main class="container mt-5 mb-5">
    <h1 class="text-center mb-4">SERVICIOS ESCOLARES</h1>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Inicio</li>
            <li class="breadcrumb-item active" aria-current="page">Alumnos</li>
        </ol>
    </nav>

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h2>Listado de Alumnos</h2>
        <a href="{{ route('alumnos.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i>AGREGAR
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center">
            <thead>
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
                    <td>{{ $alumno->numControl }}</td>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->primerAp }}</td>
                    <td>{{ $alumno->segundoAp }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-action" title="Ver detalles">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-action" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="form-eliminar d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>

<!-- Bootstrap JS y dependencias -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
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

</body>
</html>
