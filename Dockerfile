# Use the official PHP image with required extensions
FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application
COPY . .

# Install PHP dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Expose the default port
EXPOSE 8000

# Default command (can be overridden by docker-compose)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]