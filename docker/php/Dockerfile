FROM php:8.3-fpm

# Set working directory
WORKDIR /app

# Install necessary packages and PHP extensions
RUN apt-get update && apt-get install -y \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev \
    libonig-dev \
    libxslt1-dev \
    libsodium-dev \
    acl \
    && docker-php-ext-install \
        mysqli \
        pdo \
        pdo_mysql \
        sodium \
        zip \
        xsl \
        gd \
        intl \
        opcache \
        exif \
        mbstring \
    && docker-php-ext-enable pdo_mysql

# Configure PHP settings
RUN echo 'alias sf="php bin/console"' >> ~/.bashrc \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && printf '[PHP]\ndate.timezone = "Europe/Warsaw"\n' > /usr/local/etc/php/conf.d/tzone.ini \
    && echo 'memory_limit=1024M' >> /usr/local/etc/php/conf.d/memory_limit.ini \
    && echo 'upload_max_filesize=20M' >> /usr/local/etc/php/conf.d/upload_max_filesize.ini \
    && echo 'post_max_size=20M' >> /usr/local/etc/php/conf.d/post_max_size.ini \
    && echo 'opcache.enable=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.revalidate_freq=10' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.validate_timestamps=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.max_accelerated_files=10000' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.memory_consumption=192' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.max_wasted_percentage=10' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.interned_strings_buffer=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'opcache.fast_shutdown=1' >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo 'extension=pdo_mysql.so' >> /usr/local/etc/php/conf.d/pdo_mysql.ini

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Ensure Composer is installed
RUN composer --version

# Verify PHP version
RUN php -v
