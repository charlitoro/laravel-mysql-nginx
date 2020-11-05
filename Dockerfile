FROM php:7.4-fpm

# Copy composer.lock and composer.json
# COPY composer.lock composer.json /var/www/myapp/

# Set working directory
WORKDIR /var/www/myapp

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libonig-dev \ 
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    libzip-dev \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl mysqli
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# RUN composer require ricbra/php-discogs-api

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www/myapp

# Copy existing application directory permissions
COPY --chown=www:www . /var/www/myapp

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
# EXPOSE 9000
# CMD ["php-fpm"]