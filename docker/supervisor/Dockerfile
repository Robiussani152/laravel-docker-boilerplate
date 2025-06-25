ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-fpm-alpine

RUN apk update && apk add --no-cache \
    supervisor \
    bash \
    curl \
    libzip-dev \
    unzip \
    linux-headers \
    procps \
    shadow \
    autoconf \
    g++ \
    make \
    gcc \
    libc-dev \
    pkgconf \
    re2c \
    && mkdir -p /var/log/supervisor /etc/supervisor/conf.d /var/www/html/storage/logs /var/run

RUN docker-php-ext-install sysvsem
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip pdo pdo_mysql

# Install Redis extension
RUN pecl install redis && docker-php-ext-enable redis

COPY docker/supervisor/supervisord.conf /etc/supervisor/supervisord.conf
COPY docker/supervisor/supervisord.d/laravel-reverb.conf /etc/supervisor/conf.d/laravel-reverb.conf
COPY docker/supervisor/supervisord.d/laravel-worker.conf /etc/supervisor/conf.d/laravel-worker.conf

RUN chmod +x /etc/supervisor/conf.d/*.conf && \
    chmod 755 /etc/supervisor/supervisord.conf && \
    mkdir -p /var/log/supervisor && \
    touch /var/log/supervisor/supervisord.log

CMD ["/usr/bin/supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]