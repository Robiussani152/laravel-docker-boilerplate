ARG PHP_VERSION=8.2
FROM php:${PHP_VERSION}-fpm-alpine

ARG PHP_USER
ARG PHP_GROUP

RUN adduser -g ${PHP_GROUP} -s /bin/bash -D ${PHP_USER}

RUN sed -i "s/user = www-data/user = ${PHP_USER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHP_GROUP}/g" /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html/public

RUN apk add --no-cache \
    bash \
    curl \
    libzip-dev \
    zip \
    unzip \
    autoconf \
    g++ \
    make \
    gcc \
    libc-dev \
    pkgconf \
    re2c \
    linux-headers \
    procps

RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip pdo pdo_mysql

RUN pecl install redis && docker-php-ext-enable redis

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]