FROM php:8.2-fpm

# Instala dependencias para Laravel y Node.js
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    git \
    curl \
    gnupg \
    ca-certificates \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Instala Node.js 18.x (estable)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia todo el código fuente
COPY . .

# Instala AdminLTE y dependencias
RUN composer require jeroennoten/laravel-adminlte \
    && php artisan adminlte:install \
    && php artisan adminlte:plugins install

# Instala dependencias de PHP
RUN composer install --optimize-autoloader --no-dev

# Instala dependencias de Node.js
RUN npm install && npm run build

# Expone el puerto 8000
EXPOSE 8000

# Configuración final
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan view:clear \
    && php artisan migrate --force

# Comando de inicio
CMD php artisan serve --host=0.0.0.0 --port=8000
