FROM php:8.2.7-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    supervisor

COPY php/custom.ini /usr/local/etc/php/php.ini

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets zip

RUN usermod -u 1000 www-data

COPY entrypoint /var/entrypoint
COPY php/supervisor/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chmod +x /var/entrypoint
WORKDIR /var/www

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER www-data

EXPOSE 9000

CMD ["sh", "-c", "/var/entrypoint"]




