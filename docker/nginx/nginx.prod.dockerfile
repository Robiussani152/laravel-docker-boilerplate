FROM nginx:stable-alpine

ENV NGINX_USER=laravel
ENV NGINX_GROUP=laravel

RUN mkdir -p /var/www/html/public

ADD docker/nginx/conf/default.prod.conf /etc/nginx/conf.d/default.conf
ADD docker/nginx/certs/laravel-docker.test.pem /etc/nginx/certs/laravel-docker.test.pem
ADD docker/nginx/certs/laravel-docker.test-key.pem /etc/nginx/certs/laravel-docker.test-key.pem


RUN sed -i "s/user www-data/user ${NGINX_USER}/g" /etc/nginx/nginx.conf


RUN adduser -g ${NGINX_GROUP} -s /bin/bash -D ${NGINX_USER}