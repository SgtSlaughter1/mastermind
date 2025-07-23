# Stage 1: Build frontend assets with Node
FROM node:18-alpine AS node

WORKDIR /var/www/html

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

# Stage 2: Build Laravel PHP application
FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    zip \
    unzip \
    libpng \
    libjpeg-turbo \
    freetype \
    libxml2-dev \
    oniguruma \
    icu-dev \
    libzip-dev \
    mysql-client \
    && docker-php-ext-install \
        pdo_mysql \
        zip \
        gd \
        intl \
    && rm -rf /var/cache/apk/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application code
COPY . .

# Copy built frontend assets
COPY --from=node /var/www/html/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set file permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port
EXPOSE 8000

# Run Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000

