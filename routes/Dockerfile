# Gunakan PHP 8.1
FROM php:8.1-fpm

# Install dependency system
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd

# Install Composer
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install dependencies
RUN composer install --optimize-autoloader --no-dev

# Generate key (nanti bisa juga lewat ENV)
RUN php artisan key:generate

# Jalankan Laravel pakai built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
