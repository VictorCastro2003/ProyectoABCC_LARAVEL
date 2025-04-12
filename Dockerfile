# Usa una imagen oficial de PHP como base
FROM php:8.2-fpm

# Instala dependencias adicionales para Laravel y Node.js
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

# Instala Node.js 18.x (estable) y npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el archivo composer.json y realiza la instalación de dependencias de Composer
COPY composer.json composer.lock ./
RUN composer install --no-autoloader --no-scripts

# Copia el código fuente de la aplicación
COPY . .

# Instala las dependencias de Node.js
RUN npm install && npm run build

# Expone el puerto 8000
EXPOSE 8000

# Inicia el servidor PHP
CMD php artisan serve --host=0.0.0.0 --port=8000
