# Menggunakan PHP official image sebagai base
FROM php:8.2-fpm

# Install ekstensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    libzip-dev \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set direktori kerja
WORKDIR /var/www

# Copy file Laravel ke container
COPY . .

# Install dependensi aplikasi Laravel
RUN composer install --optimize-autoloader --no-dev

# Salin konfigurasi environment
COPY .env.example .env

# Generate key aplikasi
RUN php artisan key:generate

# Set permission
RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www/storage

# Expose port untuk container
EXPOSE 9000

# Perintah untuk menjalankan PHP-FPM
CMD ["php-fpm"]
