FROM nginx:stable-alpine

ARG NGINX_USER
ARG NGINX_GROUP

RUN mkdir -p /var/www/html/public

ADD docker/nginx/conf/default.conf /etc/nginx/conf.d/default.conf
ADD docker/nginx/conf/ws.laravel-docker.test.conf /etc/nginx/conf.d/ws.laravel-docker.test.conf
ADD docker/nginx/certs/laravel-docker.test.pem /etc/nginx/certs/laravel-docker.test.pem
ADD docker/nginx/certs/laravel-docker.test-key.pem /etc/nginx/certs/laravel-docker.test-key.pem
ADD docker/nginx/certs/ws.laravel-docker.test.pem /etc/nginx/certs/ws.laravel-docker.test.pem
ADD docker/nginx/certs/ws.laravel-docker.test-key.pem /etc/nginx/certs/ws.laravel-docker.test-key.pem



RUN sed -i "s/user www-data/user ${NGINX_USER}/g" /etc/nginx/nginx.conf


RUN adduser -g ${NGINX_GROUP} -s /bin/bash -D ${NGINX_USER}