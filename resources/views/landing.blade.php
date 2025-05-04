<!-- resources/views/landing.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido a la Plataforma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-center d-flex align-items-center justify-content-center vh-100">
    <div>
        <h1 class="mb-4">Bienvenido a la Plataforma de Alumnos</h1>
        <a href="{{ route('login') }}" class="btn btn-primary btn-lg m-2">Iniciar Sesión</a>
        <a href="{{ url('/register') }}" class="btn btn-success btn-lg m-2">Registrarse</a>
    </div>
</body>
</html>
