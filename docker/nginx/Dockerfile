FROM nginx:stable-alpine

ENV NGINX_USER=laravel
ENV NGINX_GROUP=laravel

RUN mkdir -p /var/www/html/public

ADD nginx/conf/default.conf /etc/nginx/conf.d/default.conf

RUN sed -i "s/user www-data/user ${NGINX_USER}/g" /etc/nginx/nginx.conf


RUN adduser -g ${NGINX_GROUP} -s /bin/bash -D ${NGINX_USER}