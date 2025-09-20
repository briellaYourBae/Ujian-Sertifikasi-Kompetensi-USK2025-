FROM php:8.3-cli

# Install dependencies + PHP extensions
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    sqlite3 \
    libsqlite3-dev \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_sqlite zip intl

COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --optimize-autoloader --no-dev

RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear

RUN php artisan key:generate --force

EXP
