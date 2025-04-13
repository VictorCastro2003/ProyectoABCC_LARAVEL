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
              <label for="Num_Control" class="form-label">Número de Control</label>
              <input type="text" class="form-control @error('Num_Control') is-invalid @enderror" name="Num_Control" id="Num_Control" value="{{ old('Num_Control') }}" placeholder="Ej. 21070010" required>
              @error('Num_Control')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="Nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control @error('Nombre') is-invalid @enderror" name="Nombre" id="Nombre" value="{{ old('Nombre') }}" placeholder="Ej. Juan" required>
              @error('Nombre')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="Primer_Ap" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control @error('Primer_Ap') is-invalid @enderror" name="Primer_Ap" id="Primer_Ap" value="{{ old('Primer_Ap') }}" placeholder="Ej. Pérez" required>
                @error('Primer_Ap')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="Segundo_Ap" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control @error('Segundo_Ap') is-invalid @enderror" name="Segundo_Ap" id="Segundo_Ap" value="{{ old('Segundo_Ap') }}" placeholder="Ej. Gómez">
                @error('Segundo_Ap')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="mb-3">
              <label for="Fecha_Nac" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control @error('Fecha_Nac') is-invalid @enderror" name="Fecha_Nac" id="Fecha_Nac" value="{{ old('Fecha_Nac') }}" required>
              @error('Fecha_Nac')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="Semestre" class="form-label">Semestre</label>
                <input type="number" class="form-control @error('Semestre') is-invalid @enderror" name="Semestre" id="Semestre" min="1" max="12" value="{{ old('Semestre') }}" placeholder="Ej. 3" required>
                @error('Semestre')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label for="Carrera" class="form-label">Carrera</label>
                <select name="Carrera" id="Carrera" class="form-select @error('Carrera') is-invalid @enderror" required>
                  <option disabled {{ old('Carrera') ? '' : 'selected' }}>Selecciona una carrera...</option>
                  <option {{ old('Carrera') == 'Ingeniería en Sistemas' ? 'selected' : '' }}>Ingeniería en Sistemas</option>
                  <option {{ old('Carrera') == 'Administración de Empresas' ? 'selected' : '' }}>Administración de Empresas</option>
                  <option {{ old('Carrera') == 'Contaduría' ? 'selected' : '' }}>Contaduría</option>
                  <option {{ old('Carrera') == 'Ingeniería Mecatrónica' ? 'selected' : '' }}>Ingeniería Mecatrónica</option>
                  <option {{ old('Carrera') == 'Otra...' ? 'selected' : '' }}>Otra...</option>
                </select>
                @error('Carrera')
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
