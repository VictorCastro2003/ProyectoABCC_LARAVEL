<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MODIFICAR ALUMNO</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body>

  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
          <ul class="navbar-nav me-auto">
            <li class="nav-item active"><a class="nav-link" href="#">INICIO</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Asignaturas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Docentes</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container mt-5 mb-5 pt-5">
    <h1 class="text-center mb-4">SERVICIOS ESCOLARES</h1>
    
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/alumnos">Alumnos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Modificar</li>
      </ol>
    </nav>

    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="p-4 shadow-lg bg-white rounded">
          <h2 class="mb-4 text-center">MODIFICAR ALUMNO</h2>

          <form id="formulario" method="POST" action="{{ route('alumnos.update', $alumno->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="numControl" class="form-label">Número de Control</label>
              <input class="form-control" name="numControl" type="text" id="numControl" value="{{ $alumno->numControl }}" required>
            </div>

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input class="form-control" name="nombre" type="text" id="nombre" value="{{ $alumno->nombre }}" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="primerAp" class="form-label">Primer Apellido</label>
                <input class="form-control" name="primerAp" type="text" id="primerAp" value="{{ $alumno->primerAp }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="segundoAp" class="form-label">Segundo Apellido</label>
                <input class="form-control" name="segundoAp" type="text" id="segundoAp" value="{{ $alumno->segundoAp }}" required>
              </div>
            </div>

            <div class="mb-3">
              <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
              <input class="form-control" name="fechaNac" type="date" id="fechaNac" value="{{ $alumno->fechaNac }}" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input class="form-control" name="semestre" type="number" id="semestre" min="1" max="12" value="{{ $alumno->semestre }}" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <select name="carrera" id="carrera" class="form-select" required>
                  <option disabled>Selecciona una carrera...</option>
                  <option value="Ingeniería en Sistemas" {{ $alumno->carrera == 'Ingeniería en Sistemas' ? 'selected' : '' }}>Ingeniería en Sistemas</option>
                  <option value="Administración de Empresas" {{ $alumno->carrera == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
                  <option value="Contaduría" {{ $alumno->carrera == 'Contaduría' ? 'selected' : '' }}>Contaduría</option>
                  <option value="Ingeniería Mecatrónica" {{ $alumno->carrera == 'Ingeniería Mecatrónica' ? 'selected' : '' }}>Ingeniería Mecatrónica</option>
                  <option value="Otra..." {{ $alumno->carrera == 'Otra...' ? 'selected' : '' }}>Otra...</option>
                </select>
              </div>
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="btn btn-success w-50">Guardar</button>
              <a href="/alumnos" class="btn btn-warning w-50 mt-2">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-muted mt-3 mb-3 text-center">
    FOOTER
  </footer>

  <script>
    document.getElementById("formulario").addEventListener("submit", function(event) {
      event.preventDefault();

      Swal.fire({
        title: "¿Estás seguro?",
        text: "¿Quieres modificar los datos del alumno?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        cancelButtonColor: "#d33",
        confirmButtonText: "Sí, modificar",
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "¡Modificado!",
            text: "Los datos han sido actualizados correctamente.",
            icon: "success",
            confirmButtonColor: "#28a745"
          }).then(() => {
            event.target.submit();
          });
        }
      });
    });
  </script>
</body>
</html>
