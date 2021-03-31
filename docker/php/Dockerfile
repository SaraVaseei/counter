FROM php:7.3-fpm

# Set working directory
WORKDIR /home/purehope/Documents/bontech/counter

# Install dependencies
RUN apt-get update && apt-get install -y \
#    build-essential \
    mariadb-client \
#    libpng-dev \
#    libjpeg62-turbo-dev \
#    libfreetype6-dev \
    locales \
    zip \
    libzip-dev \
#    jpegoptim optipng pngquant gifsicle \
#    vim \
    unzip \
    git \
    libxml2-dev \
    curl

# Clear cache
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip soap zip exif pcntl
#CMD php artisan migrate

#CMD ["php-fpm"]
