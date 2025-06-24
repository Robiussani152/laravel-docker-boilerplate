ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm-alpine

ARG PHP_USER
ARG PHP_GROUP

RUN adduser -g ${PHP_GROUP} -s /bin/bash -D ${PHP_USER}

RUN sed -i "s/user = www-data/user = ${PHP_USER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHP_GROUP}/g" /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html/public

RUN docker-php-ext-install pdo pdo_mysql opcache

ADD docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]