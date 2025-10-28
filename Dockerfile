# Gunakan base image PHP + Apache
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev zip && \
    docker-php-ext-install pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file ke container
COPY . .

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Bersihkan cache Laravel
RUN php artisan config:clear && php artisan route:clear && php artisan view:clear

# Set permission folder penting
RUN chmod -R 775 storage bootstrap/cache

# Expose port web
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]