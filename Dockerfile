FROM php:8.2-apache
WORKDIR /var/www/html
COPY . .
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader
RUN chmod -R 775 storage bootstrap/cache \
    && php artisan key:generate --force \
    && php artisan config:cache
EXPOSE 80
CMD ["apache2-foreground"]
