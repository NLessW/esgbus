FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    mysql-client \
    nodejs \
    npm \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    oniguruma-dev \
    icu-dev \
    libexif-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        pdo_mysql \
        mbstring \
        zip \
        gd \
        bcmath \
        intl \
        exif

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files first (including app/helpers.php)
COPY . .

# Install Node.js dependencies (including dev dependencies for build)
RUN npm install

# Install PHP dependencies (now app/helpers.php exists)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Build frontend assets
RUN npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

# Make start script executable
RUN chmod +x docker/start.sh

# Expose port
EXPOSE 8000

# Start command
CMD ["sh", "docker/start.sh"]
