<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ALTAS</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
          aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
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
    <h1 class="text-center" style="margin-top: 50px;">SERVICIOS ESCOLARES</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/alumnos">Alumnos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar</li>
      </ol>
    </nav>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="p-4 shadow-lg bg-white rounded">
          <h2 class="mb-4 text-center">NUEVO ALUMNO</h2>
         <form id="formulario-alta" method="POST" action="/alumnos" autocomplete="off">
  @csrf

  <div class="mb-3">
    <label for="numControl" class="form-label">Número de Control</label>
    <input type="text" class="form-control @error('numControl') is-invalid @enderror" name="numControl" id="numControl" value="{{ old('numControl') }}" placeholder="Ej. 21070010" required>
    @error('numControl')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Ej. Juan" required>
    @error('nombre')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="primerAp" class="form-label">Primer Apellido</label>
      <input type="text" class="form-control @error('primerAp') is-invalid @enderror" name="primerAp" id="primerAp" value="{{ old('primerAp') }}" placeholder="Ej. Pérez" required>
      @error('primerAp')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-md-6 mb-3">
      <label for="segundoAp" class="form-label">Segundo Apellido</label>
      <input type="text" class="form-control @error('segundoAp') is-invalid @enderror" name="segundoAp" id="segundoAp" value="{{ old('segundoAp') }}" placeholder="Ej. Gómez">
      @error('segundoAp')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="mb-3">
    <label for="fechaNac" class="form-label">Fecha de Nacimiento</label>
    <input type="date" class="form-control @error('fechaNac') is-invalid @enderror" name="fechaNac" id="fechaNac" value="{{ old('fechaNac') }}" required>
    @error('fechaNac')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="semestre" class="form-label">Semestre</label>
      <input type="number" class="form-control @error('semestre') is-invalid @enderror" name="semestre" id="semestre" min="1" max="12" value="{{ old('semestre') }}" placeholder="Ej. 3" required>
      @error('semestre')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="col-md-6 mb-3">
      <label for="carrera" class="form-label">Carrera</label>
      <select name="carrera" id="carrera" class="form-select @error('carrera') is-invalid @enderror" required>
        <option disabled {{ old('carrera') ? '' : 'selected' }}>Selecciona una carrera...</option>
        <option {{ old('carrera') == 'Ingeniería en Sistemas' ? 'selected' : '' }}>Ingeniería en Sistemas</option>
        <option {{ old('carrera') == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
        <option {{ old('carrera') == 'Contaduría' ? 'selected' : '' }}>Contaduría</option>
        <option {{ old('carrera') == 'Ingeniería Mecatrónica' ? 'selected' : '' }}>Ingeniería Mecatrónica</option>
        <option {{ old('carrera') == 'Otra...' ? 'selected' : '' }}>Otra...</option>
      </select>
      @error('carrera')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
  </div>

  <div class="text-center">
    <button type="button" class="btn btn-success w-50" onclick="confirmarEnvio()">Guardar</button>
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
    function confirmarEnvio() {
      Swal.fire({
        title: '¿Guardar alumno?',
        text: "¿Estás seguro de que deseas guardar este nuevo alumno?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#198754',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, guardar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('formulario-alta').submit();
        }
      });
    }
  </script>
</body>
</html>
