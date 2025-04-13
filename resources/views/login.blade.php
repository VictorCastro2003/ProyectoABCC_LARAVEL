<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .demo-credentials {
            background-color: #e7f5ff;
            border-left: 4px solid #228be6;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .password-toggle {
            cursor: pointer;
            color: #228be6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Iniciar Sesión</h2>

            <!-- Credenciales estáticas de demostración -->
            <div class="demo-credentials">
                <h5 class="text-primary">Credenciales de Prueba:</h5>
                <p><strong>Usuario:</strong> admin</p>
                <p><strong>Contraseña:</strong> admin123</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @if($errors->has('csrf'))
                        <strong>Error de sesión:</strong> Por favor recarga la página e intenta nuevamente
                    @else
                        {{ $errors->first() }}
                    @endif
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                <!-- Token CSRF explícito con atributo value -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" 
                           value="{{ old('username') }}" required autofocus placeholder="Ej: admin">
                </div>

                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="Ej: admin123">
                    <span class="position-absolute top-50 end-0 translate-middle-y me-2 password-toggle" onclick="togglePassword()">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Recuérdame</label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const icon = document.querySelector('.password-toggle i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        // Forzar recarga de la página si se detecta error CSRF
        if(window.location.search.includes('csrf_error=1')) {
            window.location.href = window.location.pathname;
        }
    </script>
</body>
</html>
