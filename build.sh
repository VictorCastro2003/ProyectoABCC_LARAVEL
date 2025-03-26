#!/usr/bin/env bash
# exit on error
set -o errexit

# Instalar dependencias de PHP y Composer
composer install --no-interaction --no-dev --prefer-dist

# Generar clave de Laravel
php artisan key:generate

# Ejecutar migraciones (opcional)
php artisan migrate --force
