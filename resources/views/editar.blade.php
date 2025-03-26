<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ALTAS</title>
  
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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
        <li class="breadcrumb-item"><a href="/">Alumnos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar</li>
      </ol>
    </nav>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="p-4 shadow-lg bg-white rounded">
          <h2 class="mb-4">NUEVO ALUMNO</h2>
          <form method="POST" action="" role="form" enctype="application/x-www-form-urlencoded">
            <div class="mb-3">
              <label for="num_control" class="form-label">Número de Control</label>
              <input type="text" class="form-control" name="num_control" id="num_control" placeholder="Ej. 21070010" required>
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ej. Juan" required>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="primer_ap" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" name="primer_ap" id="primer_ap" placeholder="Ej. Pérez" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="segundo_ap" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" name="segundo_ap" id="segundo_ap" placeholder="Ej. Gómez" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="fecha_nac" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" required>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="semestre" class="form-label">Semestre</label>
                <input type="number" class="form-control" name="semestre" id="semestre" min="1" max="12" placeholder="Ej. 3" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="carrera" class="form-label">Carrera</label>
                <select name="carrera" id="carrera" class="form-select" required>
                  <option selected>Selecciona una carrera...</option>
                  <option>Ingeniería en Sistemas</option>
                  <option>Administración de Empresas</option>
                  <option>Contaduría</option>
                  <option>Ingeniería Mecatrónica</option>
                  <option>Otra...</option>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-success w-50">Guardar</button>
              <a href="/" class="btn btn-warning w-50 mt-2">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="text-muted mt-3 mb-3 text-center">
    FOOTER
  </footer>
</body>
</html>
