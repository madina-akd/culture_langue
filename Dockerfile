# Dockerfile pour Laravel sur Railway
FROM php:8.2-fpm

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier le projet
WORKDIR /var/www
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Donner les droits
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN php artisan config:clear
RUN php artisan cache:clear

# Exposer le port 8080 pour Railway
EXPOSE 8080

# Lancer Laravel en production
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
