# Usamos una imagen base de PHP con Apache
FROM php:8.2-apache

# Instalamos las dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Habilitamos el módulo de reescritura de Apache
RUN a2enmod rewrite

# Instalamos Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Definimos el directorio de trabajo
WORKDIR /var/www/html

# Copiamos todos los archivos del proyecto al contenedor
COPY . .

# Instalamos las dependencias de Composer y npm
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm run build

# Exponemos el puerto 80
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
